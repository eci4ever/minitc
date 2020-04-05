@extends('layouts.admin')
@section('content')
<div class="cointainer-fluid">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.movements.create") }}">
                Rekod Pergerakan
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Senarai Pergerakan Saya</div>
        <div class="card-body">
            @foreach($users as $key => $user)
            <div class="col-sm-12">
                <div class="business-card">
                    <div class="media">
                        <div class="media-left">
                            <img class="rounded d-block border border-primary" src="/storage/avatars/{{ $user->avatar }}" width="110px" height="110px"  />
                        </div>
                        <div class="media-body ml-4">
                            <div class="job">
                                {{$user->name}} - {{ $user->jawatan }} <br>
                                <div class="phone">
                                    {{$user->skim}}
                                </div>
                            </div>
                            @foreach($user->movements as $key => $item)
                            <div class="card mt-3">
                                <div class="card-header py-1 bg-info">
                                  <strong>Tajuk</strong> : {{ $item->title }}
                                </div>
                                <div class="card-body py-2">
                                    <strong>Tempat</strong>  : {{ $item->location}} <br>
                                    <strong>Tarikh</strong>  : {{ $item->start_date->format('j F Y') }} <br>
                                    <strong>Masa</strong>    : {{ $item->start_date->format('h:i A') }} hingga {{ $item->end_date->format('h:i A') }}
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.movements.edit', $item->id)}}">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.movements.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
