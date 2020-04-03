@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">{{ $user->name }}</div>
        <div class="card-body">
                <div>
                    <img class="rounded d-block border border-primary mb-4" src="/storage/avatars/{{ $user->avatar }}" width="120px" height="120px"  />
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
                    <td><strong>No. Kad Pengenalan</strong></td>
                    <td>:</td>
                    <td>{{ $user->nokp}}</td>
                </tr>
                <tr>
                    <td><strong>Jawatan</strong></td>
                    <td>:</td>
                    <td>{{ $user->jawatan}}</td>
                </tr>
                <tr>
                    <td><strong>Skim dan Gred</strong></td>
                    <td>:</td>
                    <td>{{ $user->skim}}</td>
                </tr><tr>
                    <td><strong>No. Telefon</strong></td>
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




