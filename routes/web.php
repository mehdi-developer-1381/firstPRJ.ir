<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\brandController;

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


Route::get("demo2",function(){
    return view("demo.demo");
})->name("demo2");

//Category Routes
Route::group(["prefix" => "categories"],function(){
    Route::get("",[categoryController::class,"index"])
        ->name("categories");

    Route::post("/store/{user_create_category?}",[categoryController::class,"store"])
        ->name("category.store");

    Route::post("/remove/{param?}",[categoryController::class,"remove"])
        ->name("category.remove");

    Route::post("/total/remove",[categoryController::class,"total_remove"])
        ->name("category.total.delete");

    Route::post("/update/{param?}",[categoryController::class,"update"])
        ->name("category.update");

    Route::post("/total/update",[categoryController::class,"total_update"])
        ->name("category.total.update");

    Route::post("/total/remove/force",[categoryController::class,"total_force_delete"])
        ->name("category.total.force.delete");

});

//Brand Routes
Route::group(["prefix"=>"brands"],function(){
   Route::get("/",[brandController::class,"index"])
       ->name("brands");

   Route::post("/total/remove",[brandController::class,"total_delete"])
       ->name("brand.total.delete");

   Route::post("/update",[brandController::class,"update"])
       ->name("brand.update");

    Route::post("/store/{user_id?}",[brandController::class,"store"])
        ->name("brand.store");
});



