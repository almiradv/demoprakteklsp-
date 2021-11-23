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




Auth::routes();

Route::group(['middleware' => 'auth'], function () {
  Route::get('/', function () {
      return view('home');
  });
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/insertArsip','arsipController@insertArsip')->name('index.insertArsip'); //{{---akses arsip blade---}}
  Route::post('datapostArsip','arsipController@datapost')->name('datapost.insertArsip');
  Route::post('getdata','arsipController@getdata')->name('getdata.surat'); //<!--ambil dari fungsi get data dari controller-->
  Route::post('delete','arsipController@delete')->name('delete.arsip'); //<!--route untuk delete-->
  Route::get('lihat/{id}','arsipController@detail')->name('lihat.arsip'); //<!--route utk lihat by id-->
  Route::post('update','arsipController@update')->name('update.arsip'); //<!--update arsip-->
  Route::view('about', 'about')->name('about'); //<!--route about-->
});
