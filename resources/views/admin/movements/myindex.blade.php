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
            @foreach($users as $user)
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
                            @php
                                $mymovements = $user->movements->paginate(10);
                                foreach($mymovements as $mymovement) {
                                    echo '<div class="card mt-3">
                                        <div class="card-header py-1 bg-info">'.$mymovement->title.' </div>
                                        <div class="card-body py-1">
                                            <span class="text-normal">Tempat : '.$mymovement->location .'</span> <br>
                                            <span class="text-normal">Tarikh : '.$mymovement->start_date->format('j F Y') .'</span> <br>
                                            <span class="text-normal">Masa : '.$mymovement->start_date->format('h:i A') .' hingga '.$mymovement->end_date->format('h:i A') .'</span>
                                        </div>
                                        <div class="card-footer">
                                            <a class="btn btn-xs btn-primary" href="'.route('admin.movements.edit', $mymovement->id).'">
                                                Edit
                                            </a>
                                            <form action="'.route('admin.movements.destroy', $mymovement->id).'" method="POST" onsubmit="'; @endphp return confirm('{{ trans('global.areYouSure') }}'); @php echo '" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                            </form>
                                        </div>
                                        </div>';
                                }
                                echo $mymovements->links();
                            @endphp
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
