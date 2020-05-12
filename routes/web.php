<?php

use Illuminate\Support\Facades\Route;

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
Route::get('my-home', 'HomeController@myHome')->name('home');

Route::get('my-charts', 'HomeController@myChart')->name('chart');

Route::get('products', 'ProductController@index')->name('products.index');

Route::get('categories', 'HomeController@category')->name('category.index');
