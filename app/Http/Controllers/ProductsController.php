<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductsRequest;
use App\Models\Category;
use App\Models\Products;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function postSavedProducts(Request $request) {

        $prod = Products::all();

        $delProduct = $request->only('id');

        $delete = Products::where('id', $delProduct)->delete();

        return redirect('savedProducts');

    }

    public function getProducts()
    {
        return view('products', [
            'categories' => Category::all()
        ]);
    }

    public function postProducts(CreateProductsRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $products = Products::create($data);
        return redirect()->route('savedProducts')->with('success', 'You have successfully saved your product');
    }

    public function getSavedProducts()
    {
        $products = Products::get();

        return view("savedProducts", [
            'products' => (new ProductService())->getUserProducts(Auth::user())
        ]);

    }

    public function getApiProducts()
    {
        return response()->json(
            (new ProductService())->getUserProducts(Auth::user())
        );
    }

    public function storeApi(Request $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $products = Products::create($data);
        return response()->json($products);
    }

}
