<?php


namespace App\Services;


use App\Models\Category;
use App\Models\Products;

class CategoryService
{
    public function getCategory(Products $products)
    {
        return Category::all();
    }
}
