<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){

Route::get('/', 'App\Http\Controllers\TaskController@index'); //afisare lista sarcini pe pagina de start
Route::resource('tasks', 'App\Http\Controllers\TaskController');

Route::get('/', 'App\Http\Controllers\ProductsController@index'); //afisare pagina de start
Route::get('cart', 'App\Http\Controllers\ProductsController@cart'); //cos
Route::get('add-to-cart/{id}', 'App\Http\Controllers\ProductsController@addToCart');//adaug in cos
Route::patch('update-cart', 'App\Http\Controllers\ProductsController@update'); //modific cos
Route::delete('remove-from-cart', 'App\Http\Controllers\ProductsController@remove');//sterg din cos

});
