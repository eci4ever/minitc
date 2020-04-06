@extends('layouts.admin')
@section('content')
<div class="cointainer-fluid">

    <div class="card">
        <div class="card-header"><strong>Senarai Pergerakan Pegawai Pada {{ $datekey }}</strong>
        <div class="float-right">
            <form action="{{ route('admin.movements.allindex') }}" autocomplete="off" method="POST">
                @csrf
                <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                <input class="form-control" type="text" placeholder="Search.."
                value="{{ $datekey }}" name="datekey" id="datesearch">
                <button type="submit"><i class="fa fa-search"></i></button>
                </div>
              </form>
        </div>
        </div>
        <div class="card-body">
            {{ $users->appends(['datekey' => $datekey])->links() }}
            @foreach($users as $key => $user)
            <div class="col-md-12">
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
                            {{-- <div class="job">{{ $user->skim }}</div> --}}
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
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
@section('scripts')
<script>
$('#datesearch').daterangepicker({
    singleDatePicker: true,
    locale: {
        format: 'YYYY-MM-DD'
    }
})
</script>
@endsection
