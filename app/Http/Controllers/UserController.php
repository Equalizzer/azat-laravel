<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\products;
use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\CreateProductsRequest;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::attempt($data)) {
            return redirect()->back()->with('success', 'You have successfully loged in');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    public function getSignUp()
    {
        return view('sign-up');
    }

    public function postSignUp(CreateUsersRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);

        $imagePath = $data['img']->store('profile_images');
        $user->img_path = $imagePath;
        $user->save();

        return redirect()->route('login')->with('success', 'You have successfully sign up');
    }

    public function getUsers()
    {
        $users = User::get();                                 //talisa collection
        return view('users-list', [
            'users' => $users
        ]);
    }



    public function logOut()
    {
        Auth::logout();
        return redirect('login');
    }


}





