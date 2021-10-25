<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\products;

class UserController extends Controller
{
    public function getLogin()
    {
        return view('login', [
            'date' => 2021,
            'status' => true,
        ]);
    }

    public function postLogin(Request $request)
    {
        $data = $request->only('email', 'password');
    }

    public function getSignUp()
    {
        return view('sign-up');
    }

    public function postSignUp(Request $request)
    {
        $data = $request->only('name','email', 'password');
        $user = User::create($data);
        return redirect()->route('login')->with('success', 'You have successfully sign up');
    }

    public function getUsers()
    {
        $users = User::get();    //talisa collection
        return view('users-list', [
            'users' => $users
        ] );
    }

    public function getProducts()
    {
        return view('products');
    }

    public function postProducts(Request $request)
    {
        $data = $request->only('name','price');
        $products = Products::create($data);
        return redirect()->route('products')->with('success', 'You have successfully saved your product');
    }

    public function getSavedProducts()
    {
        $products = Products::get();

        return view("savedProducts",[
            'products' => $products
        ]);

    }
}





