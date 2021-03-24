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

Route::group(['prefix' => 'dashboard' , 'middleware' => ['auth']], function () {
    Route::get('/', 'Dashboard\DashboardController@index');
    Route::get('product' , 'ProductController@index')->name('dashboard.product.index');
    // ADMIN ROUTES
    Route::get('admin-registration' , 'Dashboard\RegistrationController@registration_form')->name('admin-register.form');
    Route::post('admin-registration' , 'Dashboard\AdminController@register')->name('admin.register');
    Route::get('admins' , 'Dashboard\AdminController@index')->name('dashboard.admin.index');
    Route::get('distributers' , 'Dashboard\DistributerController@index')->name('dashboard.distributer.index');
    Route::get('distributer-registration' , 'Dashboard\DistributerController@distributer_form')->name('admin-register.form');
    Route::post('distributer-registration' , 'Dashboard\DistributerController@register')->name('distributer.register');  
    Route::get('distributer-edit' , 'Dashboard\DistributerController@edit')->name('distributer.edit'); 
});

Route::get('dashboard/login' , 'Dashboard\LoginController@login_form');
Route::post('dashboard/login', 'Dashboard\LoginController@login')->name('dashboard.login');

