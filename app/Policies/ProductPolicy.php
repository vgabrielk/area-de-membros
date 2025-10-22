<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function store(User $user)
    {
        return $user->hasRole('creator');
    }
    public function update(User $user, Product $product)
    {
        return $product->user->id == $user->id;
    }
    public function delete(User $user, Product $product)
    {
        return $product->user->id == $user->id;
    }

}
