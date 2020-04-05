@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.verify.title_singular') }} {{ trans('global.list') }}
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
                                {{ $minute->tarikh ?? 'Test' }}
                            </td>
                            <td class="font-weight-bold">
                                <span class="{{ isset($minute->verify->status) ? 'text-success' : 'text-danger' }}">{{ $minute->verify->status ?? 'Unverified' }} </span>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-warning" href="verifies/{{ $minute->id }}/edit">
                                    Verify
                                </a>
                                @can('minute_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.minutes.show', $minute->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
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


  $('.datatable:not(.ajaxTable)').DataTable({
      buttons: dtButtons,
      "pageLength": 25,
      "order": [[ 3, "desc" ]],

      })
})

</script>
@endsection
