@extends('layouts.app')

@section('title')
    Products
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" >
                <h2>Products</h2>
            </div>

            <div class="col-md-12">
                @if ($products->isNotEmpty())
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Cost</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->cost }}</td>
                                    <td class="text-center">
                                        <button
                                            class="btn btn-success js-new-order"
                                            type="button"
                                            data-id="{{ $product->id }}"
                                        >Buy</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $products->render() !!}
                    </div>
                @else
                    <h2>Products not found</h2>
                @endif
            </div>
        </div>
    </div>
@endsection
