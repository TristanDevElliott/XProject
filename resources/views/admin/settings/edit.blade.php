@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.update", [$setting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="app_name">{{ trans('cruds.setting.fields.app_name') }}</label>
                <input class="form-control {{ $errors->has('app_name') ? 'is-invalid' : '' }}" type="text" name="app_name" id="app_name" value="{{ old('app_name', $setting->app_name) }}">
                @if($errors->has('app_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.app_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_description">{{ trans('cruds.setting.fields.app_description') }}</label>
                <input class="form-control {{ $errors->has('app_description') ? 'is-invalid' : '' }}" type="text" name="app_description" id="app_description" value="{{ old('app_description', $setting->app_description) }}">
                @if($errors->has('app_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.app_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_keywords">{{ trans('cruds.setting.fields.app_keywords') }}</label>
                <input class="form-control {{ $errors->has('app_keywords') ? 'is-invalid' : '' }}" type="text" name="app_keywords" id="app_keywords" value="{{ old('app_keywords', $setting->app_keywords) }}">
                @if($errors->has('app_keywords'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_keywords') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.app_keywords_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_author">{{ trans('cruds.setting.fields.app_author') }}</label>
                <input class="form-control {{ $errors->has('app_author') ? 'is-invalid' : '' }}" type="text" name="app_author" id="app_author" value="{{ old('app_author', $setting->app_author) }}">
                @if($errors->has('app_author'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_author') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.app_author_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_author_link">{{ trans('cruds.setting.fields.app_author_link') }}</label>
                <input class="form-control {{ $errors->has('app_author_link') ? 'is-invalid' : '' }}" type="text" name="app_author_link" id="app_author_link" value="{{ old('app_author_link', $setting->app_author_link) }}">
                @if($errors->has('app_author_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_author_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.app_author_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_logo">{{ trans('cruds.setting.fields.app_logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('app_logo') ? 'is-invalid' : '' }}" id="app_logo-dropzone">
                </div>
                @if($errors->has('app_logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.app_logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_favicon">{{ trans('cruds.setting.fields.app_favicon') }}</label>
                <div class="needsclick dropzone {{ $errors->has('app_favicon') ? 'is-invalid' : '' }}" id="app_favicon-dropzone">
                </div>
                @if($errors->has('app_favicon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('app_favicon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.app_favicon_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.setting.fields.users_can_register') }}</label>
                <select class="form-control {{ $errors->has('users_can_register') ? 'is-invalid' : '' }}" name="users_can_register" id="users_can_register">
                    <option value disabled {{ old('users_can_register', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Setting::USERS_CAN_REGISTER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('users_can_register', $setting->users_can_register) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('users_can_register'))
                    <div class="invalid-feedback">
                        {{ $errors->first('users_can_register') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.users_can_register_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="admin_email">{{ trans('cruds.setting.fields.admin_email') }}</label>
                <input class="form-control {{ $errors->has('admin_email') ? 'is-invalid' : '' }}" type="email" name="admin_email" id="admin_email" value="{{ old('admin_email', $setting->admin_email) }}">
                @if($errors->has('admin_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('admin_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.admin_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.setting.fields.posts_per_page') }}</label>
                <select class="form-control {{ $errors->has('posts_per_page') ? 'is-invalid' : '' }}" name="posts_per_page" id="posts_per_page">
                    <option value disabled {{ old('posts_per_page', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Setting::POSTS_PER_PAGE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('posts_per_page', $setting->posts_per_page) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('posts_per_page'))
                    <div class="invalid-feedback">
                        {{ $errors->first('posts_per_page') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.posts_per_page_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="default_role_id">{{ trans('cruds.setting.fields.default_role') }}</label>
                <select class="form-control select2 {{ $errors->has('default_role') ? 'is-invalid' : '' }}" name="default_role_id" id="default_role_id">
                    @foreach($default_roles as $id => $default_role)
                        <option value="{{ $id }}" {{ ($setting->default_role ? $setting->default_role->id : old('default_role_id')) == $id ? 'selected' : '' }}>{{ $default_role }}</option>
                    @endforeach
                </select>
                @if($errors->has('default_role'))
                    <div class="invalid-feedback">
                        {{ $errors->first('default_role') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.default_role_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.appLogoDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 100, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 100,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="app_logo"]').remove()
      $('form').append('<input type="hidden" name="app_logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="app_logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->app_logo)
      var file = {!! json_encode($setting->app_logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $setting->app_logo->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="app_logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.appFaviconDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 100, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 100,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="app_favicon"]').remove()
      $('form').append('<input type="hidden" name="app_favicon" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="app_favicon"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->app_favicon)
      var file = {!! json_encode($setting->app_favicon) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $setting->app_favicon->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="app_favicon" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection