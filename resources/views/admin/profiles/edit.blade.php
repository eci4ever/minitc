@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Edit Profile
    </div>

    <div class="card-body">
        <form action="{{ route("admin.profiles.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email*</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('nokp') ? 'has-error' : '' }}">
                <label for="nokp">No. Kad Pengenalan</label>
                <input type="text" id="nokp" name="nokp" class="form-control" value="{{ old('nokp', isset($user) ? $user->nokp : '') }}">
                @if($errors->has('nokp'))
                    <p class="help-block">
                        {{ $errors->first('nokp') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('jawatan') ? 'has-error' : '' }}">
                <label for="jawatan">Jawatan</label>
                <input type="text" id="jawatan" name="jawatan" class="form-control" value="{{ old('jawatan', isset($user) ? $user->jawatan : '') }}">
                @if($errors->has('jawatan'))
                    <p class="help-block">
                        {{ $errors->first('jawatan') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('skim') ? 'has-error' : '' }}">
                <label for="skim">Skim dan Gred</label>
                <input type="text" id="skim" name="skim" class="form-control" value="{{ old('skim', isset($user) ? $user->skim : '') }}">
                @if($errors->has('skim'))
                    <p class="help-block">
                        {{ $errors->first('skim') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('notelefon') ? 'has-error' : '' }}">
                <label for="notelefon">No. Telefon</label>
                <input type="text" id="notelefon" name="notelefon" class="form-control" value="{{ old('notelefon', isset($user) ? $user->notelefon : '') }}">
                @if($errors->has('notelefon'))
                    <p class="help-block">
                        {{ $errors->first('notelefon') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                <label for="avatar">Profile Picture</label>
                <input type="file" id="avatar" name="avatar" class="form-control-file" value="{{ old('avatar', isset($user) ? $user->avatar : '') }}" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 1MB.</small>
                @if($errors->has('avatar'))
                    <p class="help-block">
                        {{ $errors->first('avatar') }}
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
