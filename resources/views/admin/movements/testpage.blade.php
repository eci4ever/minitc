@extends('layouts.admin')
@section('content')


<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>User Id</th>
            <th>Title</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>
                @php
                $datas = $item->movements->paginate(4);
                foreach($datas as $data) {
                    echo $data->title.'<br>';
                }
                echo $datas->links();
                @endphp
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
