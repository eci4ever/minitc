@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">{{ $user->name }}</div>
        <div class="card-body">
                <div>
                    <img class="rounded d-block border border-primary mb-4" src="/storage/avatars/{{ $user->avatar }}" width="110px" height="110px"  />
                </div>
            <table class="table">
                <tr>
                    <td width="20%"><strong>Name</strong></td>
                    <td width="2%">:</td>
                    <td>{{ $user->name}}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>:</td>
                    <td>{{ $user->email}}</td>
                </tr>
                <tr>
                    <td><strong>Identity No.</strong></td>
                    <td>:</td>
                    <td>{{ $user->nokp}}</td>
                </tr>
                <tr>
                    <td><strong>Job Post</strong></td>
                    <td>:</td>
                    <td>{{ $user->jawatan}}</td>
                </tr>
                <tr>
                    <td><strong>Scheme and Grade</strong></td>
                    <td>:</td>
                    <td>{{ $user->skim}}</td>
                </tr><tr>
                    <td><strong>Phone No.</strong></td>
                    <td>:</td>
                    <td>{{ $user->notelefon}}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a class="btn btn-xs btn-primary" href="{{ route('admin.profiles.edit', $user->id)}}">
                Update Profile
            </a>
        </div>
    </div>
</div>
@endsection




