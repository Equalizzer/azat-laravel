<?php


namespace App\Services;


use App\Models\Products;
use App\Models\User;

class ProductService
{
    public function getUserProducts(User $user)
    {
        return Products::where('user_id', $user->id)->get();
    }
}
