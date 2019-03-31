<?php

namespace App\Services;

use App\Models\Order;

class OrderService {

    /**
     * Save order
     * @param  array $data
     * @param  App\Models\Picture $picture
     * @return void
     */
    public function store($data)
    {
        $orderData = [
            'email'        => $data['user']->email,
            'product_name' => $data['product']->name,
            'product_cost' => $data['product']->cost,
        ];

        $order = new Order();
        $order->user_id = $data['user']->id;
        $order->product_id = $data['product']->id;
        $order->status_id = $data['status_id'];
        $order->data = $orderData;
        $order->save();
    }
}