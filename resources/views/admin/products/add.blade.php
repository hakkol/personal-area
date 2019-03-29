@extends('layouts.admin')

@section('title')
    Add a product
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Add a product</h2>

                <form
                    class="js-disable-when-submit form-group"
                    action="{{ action('Admin\ProductController@store')}}"
                    method="POST"
                >
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            required
                            value="{{ old('name') }}"
                            maxlength="255"
                        >
                    </div>

                    <div class="form-group">
                        <label for="cost">Cost</label>
                        <input
                            type="number"
                            step="0.01"
                            id="cost"
                            name="cost"
                            class="form-control"
                            required
                            value="{{ old('cost') }}"
                            min="0.1"
                            max="1000000"
                        >
                    </div>

                    <div class="form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="is_hidden"
                            name="is_hidden"
                            {{ old('is_hidden') ? 'checked' : '' }}
                        >
                        <label for="is_hidden">Hide</label>
                    </div>

                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
