@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Record Staff Movement
    </div>

    <div class="card-body">
        <form action="{{ route('admin.movements.update', $movement->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Tugasan/Title*</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-clipboard"></i>
                      </span>
                    </div>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($movement) ? $movement->title : '') }}">
                </div>
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
            </div>

            <div class="form-group">
                <label>Date and Time</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-calendar-alt"></i>
                    </span>
                  </div>
                  <input type="text" name="datetime" class="form-control float-right"
                  value="{{ old('title', isset($movement) ? $movement->datetime : '') }}" id="reservation">
                </div>
            </div>


            <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                <label for="location">Location</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-clipboard"></i>
                      </span>
                    </div>
                <input type="text" id="location" name="location" class="form-control" value="{{ old('location', isset($movement) ? $movement->location : '') }}">
                </div>
                @if($errors->has('location'))
                    <p class="help-block">
                        {{ $errors->first('location') }}
                    </p>
                @endif
            </div>

            <div class="form-group {{ $errors->has('verifier') ? 'has-error' : '' }}">
                <label for="verifier">Verifier</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-clipboard"></i>
                      </span>
                    </div>
                <input type="text" id="verifier" name="verifier" class="form-control" value="{{ old('verifier', isset($movement) ? $movement->verifier : '') }}">
                </div>
                @if($errors->has('verifier'))
                    <p class="help-block">
                        {{ $errors->first('verifier') }}
                    </p>
                @endif
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
      singleDatePicker: false,
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'YYYY-MM-DD hh:mm A',
      }
    })
</script>
@endsection
