@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.minute.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.minutes.update", [$minute->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.minute.fields.name') }}*</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-file-signature"></i>
                      </span>
                    </div>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($minute) ? $minute->name : '') }}">
                </div>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>

            <div class="form-group {{ $errors->has('anjuran') ? 'has-error' : '' }}">
                <label for="anjuran">{{ trans('global.minute.fields.anjuran') }}*</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-home"></i>
                      </span>
                    </div>
                <input type="text" id="anjuran" name="anjuran" class="form-control" value="{{ old('anjuran', isset($minute) ? $minute->anjuran : '') }}">
                </div>
                @if($errors->has('anjuran'))
                    <p class="help-block">
                        {{ $errors->first('anjuran') }}
                    </p>
                @endif
            </div>

            <div class="form-group">
                <label>Tarikh Dan Masa</label>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-calendar-alt"></i>
                    </span>
                  </div>
                  <input type="text" name="tkhmasa" class="form-control float-right"
                    value="{{ old('tarikh', isset($tkhmasa) ? $tkhmasa : '') }}" id="reservation">
                </div>
            </div>

            {{-- <div class="form-group {{ $errors->has('tarikh') ? 'has-error' : '' }}">
                <label for="tarikh">{{ trans('global.minute.fields.tarikh') }}*</label>
                <input type="date" id="tarikh" name="tarikh" class="form-control" value="{{ old('tarikh', isset($minute) ? $minute->tarikh : '') }}">
                @if($errors->has('tarikh'))
                    <p class="help-block">
                        {{ $errors->first('tarikh') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.minute.fields.tarikh_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('masa') ? 'has-error' : '' }}">
                <label for="masa">{{ trans('global.minute.fields.masa') }}*</label>
                <input type="time" id="masa" name="masa" class="form-control" value="{{ old('masa', isset($minute) ? $minute->masa : '') }}">
                @if($errors->has('masa'))
                    <p class="help-block">
                        {{ $errors->first('masa') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.minute.fields.masa_helper') }}
                </p>
            </div> --}}

            <div class="form-group {{ $errors->has('tempat') ? 'has-error' : '' }}">
                <label for="tempat">{{ trans('global.minute.fields.tempat') }}*</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-map-marker"></i>
                      </span>
                    </div>
                <input type="text" id="tempat" name="tempat" class="form-control" value="{{ old('tempat', isset($minute) ? $minute->tempat : '') }}">
                </div>
                @if($errors->has('tempat'))
                    <p class="help-block">
                        {{ $errors->first('tempat') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.minute.fields.tempat_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('pegawai') ? 'has-error' : '' }}">
                <label for="pegawai">{{ trans('global.minute.fields.pegawai') }}</label>
                <textarea id="pegawai" name="pegawai" class="form-control ">{{ old('pegawai', isset($minute) ? $minute->pegawai : '') }}</textarea>
                @if($errors->has('pegawai'))
                    <p class="help-block">
                        {{ $errors->first('pegawai') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.minute.fields.pegawai_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('isu') ? 'has-error' : '' }}">
                <label for="isu">{{ trans('global.minute.fields.isu') }}</label>
                <textarea id="isu" name="isu" class="form-control ">{{ old('isu', isset($minute) ? $minute->isu : '') }}</textarea>
                @if($errors->has('isu'))
                    <p class="help-block">
                        {{ $errors->first('isu') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.minute.fields.isu_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('tindakan') ? 'has-error' : '' }}">
                <label for="tindakan">{{ trans('global.minute.fields.tindakan') }}</label>
                <textarea id="tindakan" name="tindakan" class="form-control ">{{ old('tindakan', isset($minute) ? $minute->tindakan : '') }}</textarea>
                @if($errors->has('tindakan'))
                    <p class="help-block">
                        {{ $errors->first('tindakan') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.minute.fields.tindakan_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $('#reservation').daterangepicker({
        singleDatePicker: true,
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
</script>
@endsection
