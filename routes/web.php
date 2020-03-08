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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'AdminMiddleware'], function () {
    Route::group(['prefix' => 'post'], function () {
        Route::get('list', 'PostController@index');
        Route::get('add-post', 'PostController@addForm');
        Route::post('update-post', 'PostController@updateForm');
    });
    Route::group(['prefix' => 'cate'], function () {
        Route::get('category', 'CategoryController@category');
        Route::post('update-cate', 'CategoryController@add');
    });

});
