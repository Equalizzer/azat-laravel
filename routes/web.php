<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('admin.home');
});

use App\Http\Controllers\UserController;

//Login
Route::post('/login',[UserController::class, 'postLogin'] ) ->name('login');
Route::get('/login', [UserController::class, 'getLogin']);

//Sign-up
Route::get('/sign-up', [UserController::class, 'getSignUp'])->name('user.signup');
Route::post('/sign-up', [UserController::class, 'postSignUp']);

//Users-list
Route::get('users' , [UserController::class, 'getUsers'])->name('users.list');


//Products
Route::get('/products',[UserController::class,'getProducts'])->name('products');
Route::post('/products', [UserController::class,'postProducts']) ;
Route::get('/savedProducts', [UserController::class,'getSavedProducts'])->name('savedProducts') ;



Route::get('feed', [DashboardController::class,'getFeed'])->name('feed');


//Route::post('login', 'UserControllerLogin');    //xamp 7.2 i hamar
