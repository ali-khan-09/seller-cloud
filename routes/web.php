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

Route::group(['prefix' => 'dashboard','middleware'=> 'admin'], function () {
    Route::get('/', 'Dashboard\DashboardController@index');
    Route::get('product' , 'ProductController@index')->name('dashboard.product.index');
    // ADMIN ROUTES
    Route::get('admin-registration' , 'Dashboard\RegistrationController@registration_form')->name('admin-register.form');
    Route::post('admin-registration' , 'Dashboard\AdminController@register')->name('admin.register');
    Route::get('admin' , 'Dashboard\AdminController@index')->name('dashboard.admin.index');
    Route::get('/admin/edit' , 'Dashboard\AdminController@edit')->name('dashboard.admin.edit');
    Route::post('admin-update' , 'Dashboard\AdminController@update')->name('dashboard.admin.update');
    Route::post('admin-delete' , 'Dashboard\AdminController@destroy')->name('dashboard.admin.delete');
    // DISTRIBUTOR ROUTE
    Route::get('distributers' , 'Dashboard\DistributerController@index')->name('dashboard.distributer.index');
    Route::get('distributer-registration' , 'Dashboard\DistributerController@distributer_form')->name('dashboard.distributor.create');
    Route::post('distributer-registration' , 'Dashboard\DistributerController@register')->name('distributer.register');
    Route::get('distributer-edit' , 'Dashboard\DistributerController@edit')->name('distributer.edit');
    Route::post('distributer-update' , 'Dashboard\DistributerController@editProcess')->name('distributer.update');
    Route::post('distributer-delete' , 'Dashboard\DistributerController@delete')->name('distributer.delete');

});

Route::get('dashboard/login' , 'Dashboard\LoginController@login_form');
Route::post('dashboard/login', 'Dashboard\LoginController@admin_login')->name('dashboard.login');
Route::get('dashboard-product' , 'Dashboard\ProductController@store')->name('dashboard.store-product');
Route::get('test' , function (){
//    generate_access_token();
//        session()->forget('access_token');
    token_expire();
    function getCatalogs($number = 3){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ch.api.sellercloud.com/rest/api/Catalog?model.companyID=198&model.companyID=187&model.companyID=183&model.pageNumber='.$number.'&model.pageSize=50',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.session()->get('access_token').''
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $catalogs=json_decode($response,true);
//         return $catalogs;

//        for ($i=289; $i < 571; $i++) {
//            $catalog=getCatalogs($i);
//            $count=count($catalog['Items']);
//            for ($j=0; $j <$count ; $j++) {
//                $ProductType=$catalog['Items'][$j]['ProductType'];
//                $types = array("BathFaucet", "TUB", "Mirrors", "TUBFAUCETS","KitchenFaucet");
//                $ID=$catalog['Items'][$j]['ID'];

        foreach ($catalogs as $items){
            foreach ($items as $item){
                return $item['ID'];
            }
        }

    }
    print_r(getCatalogs());
    //end product
//    token_expire();
//    echo  session()->get('access_token');

});
