<?php

namespace App\Http\Controllers;

use App\Events\UserCreatedEvent;
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

    public function store(CreateUsersRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);

        $imagePath = $data['img']->store('profile_images');
        $user->img_path = $imagePath;
        $user->save();

        event(new UserCreatedEvent($user));

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


    public function edit()
    {
        return view('users.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required' ,'email' , 'unique:users,email,' .Auth::user()->id ],
            'current_password' => ['required', 'current_password'],
            'password' => ['nullable', 'confirmed']
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->has('password')) {
            $user->password = $request->input('password');
        }
        $user->save();
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $users = USER::all();

        $delUsers = $request->only('id');

        $delete = User::where('id', $delUsers)->delete();

        return redirect('users');
    }


    //php artisan make:event UserCreatedEvent
    //php artisan make:listener UserCreatedListener
    //php artisan event:generate UserCreated        esi sarquma verevi erkus@ , imanal


    //php artisan queue:work
    //php artisan queue:retry all


}





