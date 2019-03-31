<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\UpdateOrderRequest;

use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->status_id = $request->status;
        $order->update();
    }
}
