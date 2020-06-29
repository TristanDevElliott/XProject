@extends('layouts.admin')
@section('content')
@can('media_library_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.media-libraries.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.mediaLibrary.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.mediaLibrary.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-MediaLibrary">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.mediaLibrary.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.mediaLibrary.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.mediaLibrary.fields.title_attribute') }}
                        </th>
                        <th>
                            {{ trans('cruds.mediaLibrary.fields.picture') }}
                        </th>
                        <th>
                            {{ trans('cruds.mediaLibrary.fields.user') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mediaLibraries as $key => $mediaLibrary)
                        <tr data-entry-id="{{ $mediaLibrary->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $mediaLibrary->id ?? '' }}
                            </td>
                            <td>
                                {{ $mediaLibrary->name ?? '' }}
                            </td>
                            <td>
                                {{ $mediaLibrary->title_attribute ?? '' }}
                            </td>
                            <td>
                                @foreach($mediaLibrary->picture as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($mediaLibrary->users as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('media_library_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.media-libraries.show', $mediaLibrary->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('media_library_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.media-libraries.edit', $mediaLibrary->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('media_library_delete')
                                    <form action="{{ route('admin.media-libraries.destroy', $mediaLibrary->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('media_library_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.media-libraries.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-MediaLibrary:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection