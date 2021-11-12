<?php

use App\Http\Controllers\ProductsController;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/products', [ProductsController::class, 'getApiProducts'])->name('products');
    Route::post('/savedProducts', [ProductsController::class, 'postSavedProducts'])->name('savedProducts');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', function () {
    return response()->json([
        'name' => 'John',
        'age' => 30
    ]);
});

Route::get('test', function () {
    //select * from users;
//    $users = User::get();

    //select * from users limit 1;
//    $users = User::first()->email;

    //verjin@
//    $users = User::latest()->first();


    //find by id
//    $users = User::find(22);

    //petqa anpayman first-ov kam get-ov kanchenq

    //$user->email karanq kanchenq
//    $user = User::where('email', 'azathakobyan@inbox.ru')->first();

    //$users->email  chi ashxati
//    $users = User::where('email', 'azathakobyan@inbox.ru')->get();


//    $users = User::where('id', '>', 5)->get();
//    $users = User::where('id', '>', 5)->count();
//    $users = User::select('id', 'email')->where('id', '>', 5)->count();

    //order by  desc = mecic poqr  , asc poqric mec
//    $users = User::where('id', '>', 5)->orderBy('id', 'desc')->get();


    //kam orWhere
//    $users = User::where('id', '>', 5)->orWhere('id', '<', '10')->get();


    // evna &
//    $users = User::where('id', '>', 5)->where('id', '<', '10')->get();


    //toSql
//    $users = User::where('id', '>', 5)->where('id', '<', '10')->toSql();

//    $query = User::where('id', '>', 5)->where('id', '<', '10');


//    dd($query->toSql(), $query->getBindings());



//    $products = Products::where('user_id', 9)->get();
//    dd($products);


//    $products = User::find(24)->products;
//    dd($products);

//    $users = User::has('products')->get();


//    $users = User::doesntHave('products')->get();


//    $users = User::whereHas('products', function ($query){
//       $query->where('id', '>', 7);
//    })->get();


//    $users = User::whereHas('products', function ($query){
//       $query->where('id', '>', 7);
//    })->get()->orWhereHas('categories')->get();



    //N+1
    //eager loading
    $user = User::with('products')->find(11);
    foreach ($user->products as $product) {
        dump($product->id);
    }


    //nuyn banna verevi
    //lazy loading
    $user = User::find(11);
    $user->load('products');
    foreach ($user->products as $product) {
        dump($product->id);
    }



});
