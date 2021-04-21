<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

    }
    public function  storeProducts(){
//        session()->forget('access_token');
//        return session()->get('access_token');
//        token_expire();
//        generate_access_token();

        function getCatalogs(){
//            $pages = demo();
//            $totalPages =  round($pages);
            generate_access_token();
            $number = 1;
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
            $productItems = $catalogs['TotalResults'];
            $totalPageNumbers = round($productItems/50);
            for ($number = 571; $number < $totalPageNumbers; $number++){
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
//
//            return $catalogs;
            foreach ($catalogs['Items'] as $items){
                    $types = array("BathFaucet", "TUB", "Mirrors", "TUBFAUCETS","KitchenFaucet");
                    $product_type = $items['ProductType'];
                    if (in_array($product_type , $types)){
                        $categories_check = Category::where('name', $items['ProductType'])->first();
                        if ($categories_check == null){
                            $new_category = Category::create([
                           'name' => $items['ProductType']
                        ]);
                        }
                        $product_check = Product::where('product_id' , $items['ID'])->first();
                        if ($product_check == null){
                            $new_product = Product::create([
                               'product_id' => $items['ID'],
                               'product_name' => $items['ProductName'],
                               'category_id'  => $new_category->id,
                                ]);
                        }
                }
            }
            }
        }
//       echo getCatalogs();


    echo "<pre>";print_r(getCatalogs());
    echo "</pre>";
    }
    public function test(){
        $sku = 'WTM02803RR';
       echo getSingleProduct($sku);
    }
    public function getSingleProduct($sku){
        return $product = Product::where('product_id' , $sku)->get();
    }
}
