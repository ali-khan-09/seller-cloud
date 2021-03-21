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

});

Route::get('dashboard/login' , 'Dashboard\LoginController@login_form');
Route::post('dashboard/login', 'Dashboard\LoginController@login')->name('dashboard.login');

