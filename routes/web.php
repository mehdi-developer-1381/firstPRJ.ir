<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Controller;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $users=User::all();
        return view('dashboard',compact("users"));
    })->name('dashboard');
});

Route::get("demo",["uses"=>"App\\Http\\Controllers\\Controller@test"])->name("demo");

//Category controller
Route::group(["prefix"=>"categories"],function(){
    Route::get("",["uses"=>"App\\Http\\Controllers\\categoryController@index"])->name("categories");
    Route::post("/store/{user_create_category?}",["uses"=>"App\\Http\\Controllers\\categoryController@store"])->name("category.store");
    Route::post("/remove/{param?}",["uses"=>"App\\Http\\Controllers\\categoryController@remove"])->name("category.remove");
    Route::post("/total/remove",["uses"=>"App\\Http\\Controllers\\categoryController@total_remove"])->name("category.total.delete");
    Route::post("/update/{param?}",["uses"=>"App\\Http\\Controllers\\categoryController@update"])->name("category.update");
    Route::post("/total/update",["uses"=>"App\\Http\\Controllers\\categoryController@total_update"])->name("category.total.update");
});


