@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.mediaLibrary.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.media-libraries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.mediaLibrary.fields.id') }}
                        </th>
                        <td>
                            {{ $mediaLibrary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mediaLibrary.fields.name') }}
                        </th>
                        <td>
                            {{ $mediaLibrary->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mediaLibrary.fields.title_attribute') }}
                        </th>
                        <td>
                            {{ $mediaLibrary->title_attribute }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mediaLibrary.fields.picture') }}
                        </th>
                        <td>
                            @foreach($mediaLibrary->picture as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.mediaLibrary.fields.user') }}
                        </th>
                        <td>
                            @foreach($mediaLibrary->users as $key => $user)
                                <span class="label label-info">{{ $user->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.media-libraries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection