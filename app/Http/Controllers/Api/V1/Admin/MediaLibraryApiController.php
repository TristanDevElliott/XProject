<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMediaLibraryRequest;
use App\Http\Requests\UpdateMediaLibraryRequest;
use App\Http\Resources\Admin\MediaLibraryResource;
use App\MediaLibrary;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MediaLibraryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('media_library_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MediaLibraryResource(MediaLibrary::with(['users'])->get());
    }

    public function store(StoreMediaLibraryRequest $request)
    {
        $mediaLibrary = MediaLibrary::create($request->all());
        $mediaLibrary->users()->sync($request->input('users', []));

        if ($request->input('picture', false)) {
            $mediaLibrary->addMedia(storage_path('tmp/uploads/' . $request->input('picture')))->toMediaCollection('picture');
        }

        return (new MediaLibraryResource($mediaLibrary))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MediaLibrary $mediaLibrary)
    {
        abort_if(Gate::denies('media_library_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MediaLibraryResource($mediaLibrary->load(['users']));
    }

    public function update(UpdateMediaLibraryRequest $request, MediaLibrary $mediaLibrary)
    {
        $mediaLibrary->update($request->all());
        $mediaLibrary->users()->sync($request->input('users', []));

        if ($request->input('picture', false)) {
            if (!$mediaLibrary->picture || $request->input('picture') !== $mediaLibrary->picture->file_name) {
                $mediaLibrary->addMedia(storage_path('tmp/uploads/' . $request->input('picture')))->toMediaCollection('picture');
            }
        } elseif ($mediaLibrary->picture) {
            $mediaLibrary->picture->delete();
        }

        return (new MediaLibraryResource($mediaLibrary))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MediaLibrary $mediaLibrary)
    {
        abort_if(Gate::denies('media_library_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mediaLibrary->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
