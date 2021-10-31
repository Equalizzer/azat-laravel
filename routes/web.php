<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\UserController;
use Illuminate\Session\Middleware\AuthenticateSession;

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


//Login
Route::post('/login', [UserController::class, 'postLogin'])->name('login');
Route::get('/login', [UserController::class, 'getLogin']);

//Sign-up
Route::get('/sign-up', [UserController::class, 'getSignUp'])->name('user.signup');
Route::post('/sign-up', [UserController::class, 'postSignUp']);


Route::middleware('auth')->group(function () {
    //Products
    Route::get('/products', [ProductsController::class, 'getProducts'])->name('products');
    Route::post('/products', [ProductsController::class, 'postProducts']);
    Route::get('/savedProducts', [ProductsController::class, 'getSavedProducts'])->name('savedProducts');
    Route::post('/savedProducts', [ProductsController::class, 'postSavedProducts'])->name('savedProducts');
    //Feed
    Route::get('feed', [DashboardController::class, 'getFeed'])->name('feed');
    //Users-list
    Route::get('users', [UserController::class, 'getUsers'])->name('users.list');
});


//Route::group(['middleware'=>['LoggedIn']], function(){
//   //stex grel router@
//});


Route::post('logout', [UserController::class, 'logOut']);

//Route::post('login', 'UserControllerLogin');    //xamp 7.2 i hamar
