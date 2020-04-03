@extends('layouts.admin')
@section('content')

<a href="{{ route('reports.minutereports.index', $minute->id) }}" class="btn btn-primary btn-sm mb-4" target="_blank">Print Document</a>

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
                        Mesyuarat
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
                        {{ date('d M Y', strtotime($minute->tarikh)) }}
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
                        {{ date('H:i A', strtotime($minute->tarikh)) }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Pegawai Yang Terlibat
                    </th>
                    <td>
                        <p style="white-space:pre-line">{{ $minute->pegawai }}</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        Isi / Isu Penting
                    </th>
                    <td>
                        <p style="white-space:pre-line">{{ $minute->isu }}</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        Tindakan
                    </th>
                    <td>
                        <p style="white-space:pre-line">{{ $minute->tindakan }}</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        Arahan / Cadangan
                    </th>
                    <td>
                        <p style="white-space:pre-line">{{ $minute->verify->arahan }}</p>
                    </td>
                </tr>
                <tr>
                    <th>
                        Pegawai Pengesah
                    </th>
                    <td>
                        <p style="white-space:pre-line">{{ $minute->verify->pengesah ?? 'Belum Di Sahkan'}}</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
