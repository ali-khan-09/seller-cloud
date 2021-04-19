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
    public function store_product(){
        token_expire();
//        generate_access_token();
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
//                $catalogs['Items']['Index']
            foreach ($catalogs['Items'] as $items){
//                return $items['ID'];
                  $types = array("BathFaucet", "TUB", "Mirrors", "TUBFAUCETS","KitchenFaucet");
                  $product_type = $items['ProductType'];
//                  return $items;
                if (in_array($product_type , $types)){
                    if (!Category::where('name' , $items['ProductType'])->first()) {
                        $categories = new Category();
                        $categories->name = $items['ProductType'];
                        $categories->save();

                        if (!Product::where('id', $items['ID'])->first()) {
                            $product = new Product();
                            $product->product_id = $items['ID'];
                            $product->product_name = $items['ProductName'];
                            $product->category()->attach($categories->id);
                            $product->save();
//                        if ($product_type = "BathFaucet"){
//                            $product->category_id = 1;
//                        }
//                        elseif ($product_type = "TUB"){
//                            $product->category_id = 2;
//                        }
//                        elseif ($product_type = "Mirrors"){
//                            $product->category_id = 3;
//                        }
//                        elseif ($product_type = "TUBFAUCETS"){
//                            $product->category_id = 4;
//                        }
//                        elseif ($product_type = "KitchenFaucet"){
//                            $product->category_id = 5;
//                        }
//                        $product->save();
//                    }
                    }

//                    if ($types == "BathFaucet"){
//                        $product =  new Product();
//                        $product->product_id = $items['ID'];
//                        $product->product_name = $items['ProductName'];
//                        $product->category_id = 1;
//                        $product->save();
//                    }
//                    elseif ($types == "TUB"){
//                        $product =  new Product();
//                        $product->product_id = $items['ID'];
//                        $product->product_name = $items['ProductName'];
//                        $product->category_id = 2;
//                        $product->save();
//                    }
//                    elseif ($types == "Mirrors"){
//                        $product =  new Product();
//                        $product->product_id = $items['ID'];
//                        $product->product_name = $items['ProductName'];
//                        $product->category_id = 3;
//                        $product->save();
//                    }
//                    elseif ($types == "TUBFAUCETS"){
//                        $product =  new Product();
//                        $product->product_id = $items['ID'];
//                        $product->product_name = $items['ProductName'];
//                        $product->category_id = 4;
//                        $product->save();
//                    }
//                    elseif($types == "KitchenFaucet"){
//                        $product =  new Product();
//                        $product->product_id = $items['ID'];
//                        $product->product_name = $items['ProductName'];
//                        $product->category_id = 5;
//                        $product->save();
                    }

//                    return $items;
                }

            }

        }
//        getCatalogs();
        print_r(getCatalogs());
    }
    public function  store(){
        token_expire();
        generate_access_token();

        function getCatalogs($number = 3){
//            for ($number = 1; $number < 572; $number++){
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
//         return $catalogs['28563'];
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

//            }

        }
    echo "<pre>";print_r(getCatalogs());
    echo "</pre>";
    }
}
