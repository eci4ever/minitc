@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{-- {{ trans('global.show') }} {{ trans('global.minute.title') }} --}}
        <div class="card-header text-center"><strong>
            MINIT CURAI <br>
            MESYUARAT LUAR / BENGKEL / KURSUS / PROGRAM <br>
            JABATAN PENDIDIKAN NEGERI MELAKA    <br>
            </strong></div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.minute.fields.name') }}
                    </th>
                    <td>
                        {{ $minute->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.minute.fields.anjuran') }}
                    </th>
                    <td>
                        {!! $minute->anjuran !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.minute.fields.tarikh') }}
                    </th>
                    <td>
                        {{ $minute->tarikh }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.minute.fields.tempat') }}
                    </th>
                    <td>
                        {{ $minute->tempat }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.minute.fields.masa') }}
                    </th>
                    <td>
                        {{ $minute->masa }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.minute.fields.pegawai') }}
                    </th>
                    <td>
                        <p style="white-space:pre-line">{{ $minute->pegawai }}</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.minute.fields.isu') }}
                    </th>
                    <td>
                        <p style="white-space:pre-line">{{ $minute->isu }}</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.minute.fields.tindakan') }}
                    </th>
                    <td>
                        <p style="white-space:pre-line">{{ $minute->tindakan }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
