@extends('layouts.admin')
@section('content')
@can('minute_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.minutes.create") }}">
                {{ trans('global.add') }} {{ trans('global.minute.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.minute.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                         <th>
                            {{ trans('global.minute.fields.name') }}
                        </th>
                        <th>
                            {{ trans('global.minute.fields.anjuran') }}
                        </th>
                        <th>
                            {{ trans('global.minute.fields.tarikh') }}
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($minutes as $key => $minute)
                        <tr data-entry-id="{{ $minute->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $minute->name ?? '' }}
                            </td>
                            <td>
                                {{ $minute->anjuran ?? '' }}
                            </td>
                            <td>
                                {{ date('d M Y', strtotime($minute->tarikh)) ?? '' }}
                            </td>
                            <td class="table-success font-weight-bold">
                                {{ $minute->verify->status ?? 'Unverified' }}
                            </td>
                            <td>
                                @can('minute_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.minutes.show', $minute->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('minute_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.minutes.edit', $minute->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('minute_delete')
                                    <form action="{{ route('admin.minutes.destroy', $minute->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
// @can('minute_delete')
//   dtButtons.push(deleteButton)
// @endcan

  $('.datatable:not(.ajaxTable)').DataTable({
      buttons: dtButtons,
      "pageLength": 5,
      "order": [[ 3, "desc" ]],

      })
})

</script>
@endsection
