@extends('layouts.admin')
@section('content')
@can('announcement_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.announcements.create") }}">
                Add Announcement
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Announcement List
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Content
                        </th>
                        <th>
                            Date and Time
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($announcements as $key => $announcement)
                        <tr data-entry-id="{{ $announcement->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $announcement->title ?? '' }}
                            </td>
                            <td>
                                {{ Str::words($announcement->content, 5,'....') }}
                            </td>
                            <td>
                                {{ date('d M Y H:i A', strtotime($announcement->datetime)) ?? '' }}
                            </td>
                            <td>
                                @can('announcement_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.announcements.show', $announcement->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('announcement_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.announcements.edit', $announcement->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('announcement_delete')
                                    <form action="{{ route('admin.announcements.destroy', $announcement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.announcements.massDestroy') }}",
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('announcement_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({
      buttons: dtButtons,
      "pageLength": 25,
      "order": [[ 3, "desc" ]],
      })
})

</script>
@endsection
