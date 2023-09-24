<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CkUploadController;
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

    Route::resource('/admin/articals', 'AdminArticalsController', ['names'=>[
        'index'=>'admin.articals.index',
        'create'=>'admin.articals.create',
        'edit'=>'admin.articals.edit'
    ]]);

    Route::resource('/admin/quotes', 'AdminQuotesController', ['names'=>[
        'index'=>'admin.quotes.index',
        'edit'=>'admin.quotes.edit'
    ]]);

    Route::resource('/admin/categories', 'AdminCategoriesController', ['names'=>[
        'index'=>'admin.categories.index',
        'edit'=>'admin.categories.edit'
    ]]);

    Route::post('upload',['App\Http\Controllers\CkUploadController', 'upload'])->name('ckeditor.upload');

});


Route::get('/', 'HomeController@index');
