<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMediaLibraryRequest;
use App\Http\Requests\StoreMediaLibraryRequest;
use App\Http\Requests\UpdateMediaLibraryRequest;
use App\MediaLibrary;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MediaLibraryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('media_library_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mediaLibraries = MediaLibrary::all();

        return view('admin.mediaLibraries.index', compact('mediaLibraries'));
    }

    public function create()
    {
        abort_if(Gate::denies('media_library_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');

        return view('admin.mediaLibraries.create', compact('users'));
    }

    public function store(StoreMediaLibraryRequest $request)
    {
        $mediaLibrary = MediaLibrary::create($request->all());
        $mediaLibrary->users()->sync($request->input('users', []));

        foreach ($request->input('picture', []) as $file) {
            $mediaLibrary->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('picture');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $mediaLibrary->id]);
        }

        return redirect()->route('admin.media-libraries.index');
    }

    public function edit(MediaLibrary $mediaLibrary)
    {
        abort_if(Gate::denies('media_library_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');

        $mediaLibrary->load('users');

        return view('admin.mediaLibraries.edit', compact('users', 'mediaLibrary'));
    }

    public function update(UpdateMediaLibraryRequest $request, MediaLibrary $mediaLibrary)
    {
        $mediaLibrary->update($request->all());
        $mediaLibrary->users()->sync($request->input('users', []));

        if (count($mediaLibrary->picture) > 0) {
            foreach ($mediaLibrary->picture as $media) {
                if (!in_array($media->file_name, $request->input('picture', []))) {
                    $media->delete();
                }
            }
        }

        $media = $mediaLibrary->picture->pluck('file_name')->toArray();

        foreach ($request->input('picture', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $mediaLibrary->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('picture');
            }
        }

        return redirect()->route('admin.media-libraries.index');
    }

    public function show(MediaLibrary $mediaLibrary)
    {
        abort_if(Gate::denies('media_library_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mediaLibrary->load('users');

        return view('admin.mediaLibraries.show', compact('mediaLibrary'));
    }

    public function destroy(MediaLibrary $mediaLibrary)
    {
        abort_if(Gate::denies('media_library_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mediaLibrary->delete();

        return back();
    }

    public function massDestroy(MassDestroyMediaLibraryRequest $request)
    {
        MediaLibrary::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('media_library_create') && Gate::denies('media_library_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MediaLibrary();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
