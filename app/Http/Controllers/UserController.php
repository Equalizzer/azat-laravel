<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        dd($data);
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
}





