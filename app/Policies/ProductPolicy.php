<?php

namespace App\Policies;

use App\Models\{
    Product,
    User
};

use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Checking the product that the user buys
     *
     * @param  User       $user       actual logged in user
     * @param  Product $product product
     *
     * @return boolean
     */
    public function visible(User $user, Product $product)
    {
        return !$product->is_hidden;
    }
}
