@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.mediaLibrary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.media-libraries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.mediaLibrary.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mediaLibrary.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_attribute">{{ trans('cruds.mediaLibrary.fields.title_attribute') }}</label>
                <input class="form-control {{ $errors->has('title_attribute') ? 'is-invalid' : '' }}" type="text" name="title_attribute" id="title_attribute" value="{{ old('title_attribute', '') }}">
                @if($errors->has('title_attribute'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_attribute') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mediaLibrary.fields.title_attribute_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="picture">{{ trans('cruds.mediaLibrary.fields.picture') }}</label>
                <div class="needsclick dropzone {{ $errors->has('picture') ? 'is-invalid' : '' }}" id="picture-dropzone">
                </div>
                @if($errors->has('picture'))
                    <div class="invalid-feedback">
                        {{ $errors->first('picture') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mediaLibrary.fields.picture_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="users">{{ trans('cruds.mediaLibrary.fields.user') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users[]" id="users" multiple>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ in_array($id, old('users', [])) ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.mediaLibrary.fields.user_helper') }}</span>
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
    var uploadedPictureMap = {}
Dropzone.options.pictureDropzone = {
    url: '{{ route('admin.media-libraries.storeMedia') }}',
    maxFilesize: 100, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
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
      $('form').append('<input type="hidden" name="picture[]" value="' + response.name + '">')
      uploadedPictureMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPictureMap[file.name]
      }
      $('form').find('input[name="picture[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($mediaLibrary) && $mediaLibrary->picture)
      var files =
        {!! json_encode($mediaLibrary->picture) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="picture[]" value="' + file.file_name + '">')
        }
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