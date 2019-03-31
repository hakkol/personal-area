@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" >
                <h2>Orders</h2>
            </div>

            <div class="col-md-12">
                @if ($orders->isNotEmpty())
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Product cost</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->product_name }}</td>
                                    <td>{{ $order->product_cost }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        <select
                                            class="form-control js-order-status"
                                            data-id="{{ $order->id }}"
                                        >
                                            @foreach ($statuses as $status)
                                                <option
                                                    value="{{ $status->id }}"
                                                    {{ $status->id === $order->status_id ? 'selected' : '' }}
                                                >{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $orders->render() !!}
                    </div>
                @else
                    <h2>Orders not found</h2>
                @endif
            </div>
        </div>
    </div>
@endsection
