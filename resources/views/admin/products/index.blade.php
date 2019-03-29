@extends('layouts.admin')

@section('title')
    Products
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" >
                <h2>Products</h2>

                <a
                    class="btn btn-success form-group"
                    href="{{ action('Admin\ProductController@create')}}"
                >
                    Add a product
                </a>
            </div>

            <div class="col-md-12">
                @if ($products->isNotEmpty())
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Cost</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->cost }}</td>
                                    <td>
                                        {{ $product->is_hidden ? 'Is hidden' : 'Is visible' }}
                                    </td>
                                    <td class="text-center">
                                        <a
                                            href="{{ action('Admin\ProductController@edit', ['id' => $product->id])}}"
                                            class="btn btn-primary"
                                        >
                                            Edit
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <form class="js-disable-when-submit js-delete-form"
                                            method="POST"
                                            action="{{ action('Admin\ProductController@destroy', ['id' => $product->id])}}"
                                        >
                                            {!! csrf_field() !!}
                                            {{ method_field('DELETE') }}
                                        </form>

                                        <button type="button" class="btn btn-danger js-delete">Delete</button>
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
