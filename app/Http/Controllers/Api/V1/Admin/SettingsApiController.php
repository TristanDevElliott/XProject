<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Http\Resources\Admin\SettingResource;
use App\Setting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SettingResource(Setting::with(['default_role'])->get());
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

        return (new SettingResource($setting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Setting $setting)
    {
        abort_if(Gate::denies('setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SettingResource($setting->load(['default_role']));
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

        return (new SettingResource($setting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Setting $setting)
    {
        abort_if(Gate::denies('setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
