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
    return view('master');
});
Route::get('/','ProductController@index')->name('home');
Route::get('/product','ProductController@index')->name('product');
Route::get('/product/tambah','ProductController@tambah')->name('product.tambah');
Route::get('/product/edit/{id_products}','ProductController@edit')->name('product.edit');
Route::get('/product/delete/{id_products}','ProductController@delete')->name('product.delete');
Route::post('/product/simpan','ProductController@simpan')->name('product.simpan');
Route::post('/product/update','ProductController@update')->name('product.update');
Route::get('/product/cari', 'ProductController@cari')->name('product.cari');


Route::get('/user','UserController@index')->name('user');
Route::get('/user/reset/{id_user}','UserController@reset')->name('user.reset');
Route::get('/user/delete/{id_user}','UserController@delete')->name('user.delete');
Route::get('/user/cari', 'UserController@cari')->name('user.cari');

Route::get('/transaction','TransactionController@index')->name('transaction');
Route::get('/transaction/detail/{id_transaction}','TransactionController@detail')->name('transaction.detail');
Route::post('/transaction/update','TransactionController@update')->name('detail.update');

Route::get('/upload','UploadController@upload')->name('upload');
Route::get('/upload/proses','UploadController@proses_upload')->name('upload.proses');

