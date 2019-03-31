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
        $order = new Order();
        $order->user_id = $data['user_id'];
        $order->product_id = $data['product_id'];
        $order->status_id = $data['status_id'];
        $order->save();
    }
}