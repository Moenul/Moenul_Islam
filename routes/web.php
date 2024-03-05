<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CkUploadController;
use App\Http\Controllers\Auth\ProviderController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
    Artisan::call('optimize');

    return "Cached cleared!";
});

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('logout/', 'Auth\loginController@logout');

Route::group(['middleware' => 'admin'], function(){

    Route::get('/admin', function () {
        return view('admin.index');
    });

    Route::get('/admin', 'AdminDashboardController@index');

    Route::resource('/admin/services', 'AdminServicesController', ['names'=>[
        'index'=>'admin.services.index',
        'edit'=>'admin.services.edit'
    ]]);

    Route::resource('/admin/galleries', 'AdminGalleriesController', ['names'=>[
        'index'=>'admin.galleries.index',
        'edit'=>'admin.galleries.edit'
    ]]);

    Route::post('/admin/galleries-reorder', ['App\Http\Controllers\AdminGalleriesController', 'reorder'])->name('admin.galleries-reorder');

    Route::resource('/admin/socials', 'AdminSocialsController', ['names'=>[
        'index'=>'admin.socials.index',
        'edit'=>'admin.socials.edit'
    ]]);

    Route::resource('/admin/mgArticles', 'AdminMgArticlesController', ['names'=>[
        'index'=>'admin.mgArticles.index',
        'create'=>'admin.mgArticles.create',
        'edit'=>'admin.mgArticles.edit'
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

    Route::resource('/admin/mails', 'AdminMailsController', ['names'=>[
        'index'=>'admin.mails.index',
        'show'=>'admin.mails.show'
    ]]);

    Route::resource('/admin/profile', 'AdminProfileController', ['names'=>[
        'index'=>'admin.profile.index'
    ]]);

});

Route::resource('/articles', 'ArticlesController', ['names'=>[
    'index'=>'articles.index',
    'show'=>'articles.show',
]]);

Route::post('contactMail', 'ContactMailsController@store');

Route::get('/privacy_policy ', function () {
    return view('privacy_policy');
});
Route::get('/terms_and_condition ', function () {
    return view('terms_and_condition');
});

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);

Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

Route::get('/', 'HomeController@index');
