@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        Create Announcement
    </div>
    <div class="card-body">
        <form action="{{ route("admin.announcements.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Title*</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-clipboard"></i>
                      </span>
                    </div>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($announcement) ? $announcement->title : '') }}">
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
                  <input type="text" name="datetime" class="form-control float-right" id="reservation">
                </div>
            </div>
            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control ">{{ old('content', isset($announcement) ? $announcement->content : '') }}</textarea>
                @if($errors->has('content'))
                    <p class="help-block">
                        {{ $errors->first('content') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Save">
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
        format: 'YYYY-MM-DD hh:mm A',
      }
    })
</script>
@endsection
