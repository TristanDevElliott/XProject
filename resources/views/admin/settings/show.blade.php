@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.setting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.id') }}
                        </th>
                        <td>
                            {{ $setting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.app_name') }}
                        </th>
                        <td>
                            {{ $setting->app_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.app_description') }}
                        </th>
                        <td>
                            {{ $setting->app_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.app_keywords') }}
                        </th>
                        <td>
                            {{ $setting->app_keywords }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.app_author') }}
                        </th>
                        <td>
                            {{ $setting->app_author }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.app_author_link') }}
                        </th>
                        <td>
                            {{ $setting->app_author_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.app_logo') }}
                        </th>
                        <td>
                            @if($setting->app_logo)
                                <a href="{{ $setting->app_logo->getUrl() }}" target="_blank">
                                    <img src="{{ $setting->app_logo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.app_favicon') }}
                        </th>
                        <td>
                            @if($setting->app_favicon)
                                <a href="{{ $setting->app_favicon->getUrl() }}" target="_blank">
                                    <img src="{{ $setting->app_favicon->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.users_can_register') }}
                        </th>
                        <td>
                            {{ App\Setting::USERS_CAN_REGISTER_SELECT[$setting->users_can_register] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.admin_email') }}
                        </th>
                        <td>
                            {{ $setting->admin_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.posts_per_page') }}
                        </th>
                        <td>
                            {{ App\Setting::POSTS_PER_PAGE_SELECT[$setting->posts_per_page] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.default_role') }}
                        </th>
                        <td>
                            {{ $setting->default_role->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection