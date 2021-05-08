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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'], function () {
    Route::get('/', 'Dashboard\DashboardController@index');
    Route::get('product' , 'ProductController@index')->name('dashboard.product.index');
    // ADMIN ROUTES

    Route::get('admin-registration' , 'Dashboard\RegistrationController@registration_form')->name('admin-register.form')->middleware('auth:admin','can:create');
    Route::post('admin-registration' , 'Dashboard\AdminController@register')->name('admin.register')->middleware('auth:admin', 'can:create');
    Route::get('admin' , 'Dashboard\AdminController@index')->name('dashboard.admin.index');
    Route::get('/admin/edit' , 'Dashboard\AdminController@edit')->name('dashboard.admin.edit')->middleware('auth:admin', 'can:create');
    Route::post('admin-update' , 'Dashboard\AdminController@update')->name('dashboard.admin.update')->middleware('auth:admin', 'can:create');
    Route::post('admin-delete' , 'Dashboard\AdminController@destroy')->name('dashboard.admin.delete')->middleware('auth:admin', 'can:create');

    // DISTRIBUTOR ROUTE
    Route::get('distributers' , 'Dashboard\DistributerController@index')->name('dashboard.distributer.index');
    Route::get('distributer-registration' , 'Dashboard\DistributerController@distributer_form')->name('dashboard.distributor.create');
    Route::post('distributer-registration' , 'Dashboard\DistributerController@register')->name('distributer.register');
    Route::get('distributer-edit' , 'Dashboard\DistributerController@edit')->name('distributer.edit');
    Route::post('distributer-update' , 'Dashboard\DistributerController@editProcess')->name('distributer.update');
    Route::post('distributer-delete' , 'Dashboard\DistributerController@delete')->name('distributer.delete');
    // Logout Route
    Route::post('dashboard-logout','Dashboard\LoginController@dashboard_logout')->name('dashboard.logout');
});

Route::get('dashboard/login' , 'Dashboard\LoginController@login_form')->name('dashboard.login.form');
Route::post('dashboard/login', 'Dashboard\LoginController@admin_login')->name('dashboard.login');
Route::get('product-result' , 'Dashboard\ProductController@storeProducts')->name('dashboard.store-product');

Route::get('product' , 'Dashboard\ProductController@items');
Route::group(['prefix' => 'admins'] , function(){
Route::get('reset/{token}' , 'Auth\ResetPasswordController@showResetForm')->name('admins.showResetForm');
Route::get('resetemail/{user_type}' , 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admins.showResetEmailForm');
Route::post('reset' , 'Auth\ResetPasswordController@reset')->name('admins.reset.update');
});



Route::get('/test-excel' , 'Dashboard\ExcelDataController@test');
Route::post('/test-excel' , 'Dashboard\ExcelDataController@excel')->name('test');
