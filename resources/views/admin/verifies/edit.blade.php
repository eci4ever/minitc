@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ $minute->name }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.verifies.update", [$minute->verify->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group {{ $errors->has('arahan') ? 'has-error' : '' }}">
                <label for="arahan">{{ trans('global.verify.fields.arahan') }}</label>
                <textarea id="arahan" name="arahan" class="form-control ">{{ old('arahan', isset($minute->verify->arahan) ? $minute->verify->arahan : '') }}</textarea>
                @if($errors->has('arahan'))
                    <p class="help-block">
                        {{ $errors->first('arahan') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.verify.fields.arahan_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('pengesah') ? 'has-error' : '' }}">
                <label for="pengesah">{{ trans('global.verify.fields.pengesah') }}</label>
                <input type="text" id="pengesah" name="pengesah" class="form-control"
                value="{{ old('pengesah', isset($minute->verify->pengesah) ? $minute->verify->pengesah : '') }}" aria-describedby="pengesahHelp">
                <small id="pengesahHelp" class="form-text text-muted">Nyatakan Nama Pengesah</small>
                @if($errors->has('pengesah'))
                    <p class="help-block">
                        {{ $errors->first('pengesah') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.verify.fields.pengesah_helper') }}
                </p>
            </div>

            <div class="form-check">
                <input type="hidden" class="form-check-input" id="statusHidden" name="status" value="">
                <input type="checkbox" class="form-check-input" id="status" name="status" value="Verified"
                @if ($minute->verify->status != null)
                    checked
                @endif
                >

                <label class="form-check-label" for="status">Sahkan</label>
              </div>

            <div class="form-group">
                <input type="hidden" id="minute_id" name="minute_id" class="form-control"
                value="{{ $minute->id }}">
            </div>



            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
