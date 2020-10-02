<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('auth.login');
});
Route::get('/dasboard', function () {
    return view('dasboard.dasboard');
})->middleware('auth')  ;

Route::group(['prefix' => 'admin'], function () {
    // maker
    Route::get('/maker','MakerController@index')->name('makerList') ;
    Route::get('/maker/create','MakerController@createProductCar')->name('create') ;
    Route::get('/maker/edit/{id}','MakerController@editProductCar')->name('edit');
    Route::get('maker/update','MakerController@updateProductCar')->name('update') ;
    Route::get('maker/delete/{id}','MakerController@deleteProductCar')->name('delete') ;
    //cardModel
    Route::get('/carmodel','CardmodelController@index')->name('carModelList') ;
    Route::get('/carmodel/create','CardmodelController@createCar')->name('createCar') ;
    Route::get('/carmodel/edit/{id}','CardmodelController@editCar')->name('editCar') ;
    Route::get('/carmodel/update','CardmodelController@updateCar')->name('updateCar') ;
    Route::get('/carmodel/delete/{id}','CardmodelController@deleteCar')->name('deleteCar') ;
    // product
    Route::get('/product','ProductController@index')->name('productList') ;
    Route::get('tableproduct','ProductController@tableProduct')->name('tableProduct');
    Route::get('/createProduct','ProductController@createProduct')->name('createProduct') ;
    Route::get('/product/edit/{id}','ProductController@editProduct')->name('editProduct') ;
    Route::get('/product/update','ProductController@updateProduct')->name('updateProduct') ;
    Route::get('/product/remove/{id}','ProductController@removeProduct')->name('removeProduct') ;
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
