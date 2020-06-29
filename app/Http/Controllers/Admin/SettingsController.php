<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySettingRequest;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Role;
use App\Setting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settings = Setting::all();

        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        abort_if(Gate::denies('setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $default_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.settings.create', compact('default_roles'));
    }

    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create($request->all());

        if ($request->input('app_logo', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . $request->input('app_logo')))->toMediaCollection('app_logo');
        }

        if ($request->input('app_favicon', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . $request->input('app_favicon')))->toMediaCollection('app_favicon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $setting->id]);
        }

        return redirect()->route('admin.settings.index');
    }

    public function edit(Setting $setting)
    {
        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $default_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $setting->load('default_role');

        return view('admin.settings.edit', compact('default_roles', 'setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $setting->update($request->all());

        if ($request->input('app_logo', false)) {
            if (!$setting->app_logo || $request->input('app_logo') !== $setting->app_logo->file_name) {
                $setting->addMedia(storage_path('tmp/uploads/' . $request->input('app_logo')))->toMediaCollection('app_logo');
            }
        } elseif ($setting->app_logo) {
            $setting->app_logo->delete();
        }

        if ($request->input('app_favicon', false)) {
            if (!$setting->app_favicon || $request->input('app_favicon') !== $setting->app_favicon->file_name) {
                $setting->addMedia(storage_path('tmp/uploads/' . $request->input('app_favicon')))->toMediaCollection('app_favicon');
            }
        } elseif ($setting->app_favicon) {
            $setting->app_favicon->delete();
        }

        return redirect()->route('admin.settings.index');
    }

    public function show(Setting $setting)
    {
        abort_if(Gate::denies('setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting->load('default_role');

        return view('admin.settings.show', compact('setting'));
    }

    public function destroy(Setting $setting)
    {
        abort_if(Gate::denies('setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting->delete();

        return back();
    }

    public function massDestroy(MassDestroySettingRequest $request)
    {
        Setting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_create') && Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Setting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
