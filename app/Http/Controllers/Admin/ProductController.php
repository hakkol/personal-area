<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests\{
    SaveProductRequest,
    UpdateProductRequest
};

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SaveProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    {
        $product = new Product($request->all());
        $product->is_hidden = $request->is_hidden ? true : false;
        $product->save();

        flash('The product has been saved')->success();

        return redirect()->action('Admin\ProductController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->is_hidden = $request->is_hidden ? true : false;
        $product->update($request->all());

        flash('The product has been saved')->success();

        return redirect()->action('Admin\ProductController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        flash('The product has been deleted')->success();

        return redirect()->action('Admin\ProductController@index');
    }
}
