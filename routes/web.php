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
    return view('home');
});

Auth::routes();

Route::group(['middleware' => 'admin'], function(){

    Route::get('/admin', function () {
        return view('admin.index');
    });

    Route::resource('/admin/services', 'AdminServicesController', ['names'=>[
        'index'=>'admin.services.index',
        'edit'=>'admin.services.edit'
    ]]);

    Route::resource('/admin/galleries', 'AdminGalleriesController', ['names'=>[
        'index'=>'admin.galleries.index',
        'edit'=>'admin.galleries.edit'
    ]]);

    Route::resource('/admin/socials', 'AdminSocialsController', ['names'=>[
        'index'=>'admin.socials.index',
        'edit'=>'admin.socials.edit'
    ]]);

});


Route::get('/', 'HomeController@index');
