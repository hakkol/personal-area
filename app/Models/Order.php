<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
    * Get the status associated with the given order.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function status()
    {

        return $this->belongsTo('App\Models\Status');
    }

    /**
     * Get product name from order
     *
     * @return string  name
     */
    public function getProductNameAttribute()
    {

        return $this->checkDataAttribute('product_name');
    }

    /**
     * Get product name from order
     *
     * @return string  name
     */
    public function getProductCostAttribute()
    {

        return $this->checkDataAttribute('product_cost');
    }

    /**
     * Get status name from order
     *
     * @return string  name
     */
    public function getStatusNameAttribute()
    {
        $status = $this->status;

        if (!$status) return '';

        return $status->name;
    }

    /**
     * Get data value
     *
     * @return string  data value
     */
    public function checkDataAttribute($name)
    {
        $data = $this->data;

        if (isset($data[$name])) return $data[$name];

        return '';
    }
}
