@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Announcement
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Title
                    </th>
                    <td>
                        {{ $announcement->title }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Content
                    </th>
                    <td>
                        <span style="white-space:pre">{{ $announcement->content }}</span>
                    </td>
                </tr>
                <tr>
                    <th>
                        Date and Time
                    </th>
                    <td>
                        {{ date('d M Y H:i A', strtotime($announcement->datetime)) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
