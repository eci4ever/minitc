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
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-user-circle"></i>
                      </span>
                    </div>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}">
                </div>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email*</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                      </span>
                    </div>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}">
                </div>
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('nokp') ? 'has-error' : '' }}">
                <label for="nokp">No. Kad Pengenalan</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-id-badge"></i>
                      </span>
                    </div>
                <input type="text" id="nokp" name="nokp" class="form-control" value="{{ old('nokp', isset($user) ? $user->nokp : '') }}">
                </div>
                @if($errors->has('nokp'))
                    <p class="help-block">
                        {{ $errors->first('nokp') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('jawatan') ? 'has-error' : '' }}">
                <label for="jawatan">Jawatan</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-user-tag"></i>
                      </span>
                    </div>
                <input type="text" id="jawatan" name="jawatan" class="form-control" value="{{ old('jawatan', isset($user) ? $user->jawatan : '') }}">
                </div>
                @if($errors->has('jawatan'))
                    <p class="help-block">
                        {{ $errors->first('jawatan') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('skim') ? 'has-error' : '' }}">
                <label for="skim">Skim dan Gred</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-briefcase"></i>
                      </span>
                    </div>
                <input type="text" id="skim" name="skim" class="form-control" value="{{ old('skim', isset($user) ? $user->skim : '') }}">
                </div>
                @if($errors->has('skim'))
                    <p class="help-block">
                        {{ $errors->first('skim') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('notelefon') ? 'has-error' : '' }}">
                <label for="notelefon">No. Telefon</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-phone"></i>
                      </span>
                    </div>
                <input type="text" id="notelefon" name="notelefon" class="form-control" value="{{ old('notelefon', isset($user) ? $user->notelefon : '') }}">
                </div>
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
