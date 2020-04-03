@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.product.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.product.fields.name') }}
                    </th>
                    <td>
                        {{ $product->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Description
                    </th>
                    <td>
                        {{ $product->description }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Tarikh Dan Masa
                    </th>
                    <td>
                        {{ date('d M Y H:i A', strtotime($product->price)) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
