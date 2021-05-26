<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function  storeProducts(){

        function getCatalogs(){
            token_expire();
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
    public function getSingleProduct($sku){
        return $product = Product::where('product_id' , $sku)->get();
    }
    public function test(){
        generate_access_token();
        $sku = 'M13VAT3036T';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ch.api.sellercloud.com/rest/api/Catalog?model.sKU='.$sku.'',
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
        return $catalogs;
//        echo "<pre>";print_r($catalogs);
//        echo "</pre>";
//        return $catalogs['Items'][0]['LongDescription'];
    }
    public function items(){
        token_expire();
        $number = 4;
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
        //$productItems = $catalogs['TotalResults'];
//        return $catalogs['Items'][1];
        //Saving product to Db

        foreach ($catalogs['Items'] as $items){
            $types = array("BathFaucet", "TUB", "Mirrors", "TUBFAUCETS","KitchenFaucet");
            $product_type = $items['ProductType'];
            if (in_array($product_type , $types)){
                    $new_category = Category::firstOrCreate([
                        'name' => $items['ProductType']
                    ]);

            //Product saving
                $new_product = Product::create([
                    'sku' => $items['ID'],
                    'product_name' => $items['ProductName'],
                    'product_image' => $items['ImageUrl'],
                    'category_id'  => $new_category->id,
                    'product_short_desc'=>$items['ShortDescription'],
                    'product_long_desc' => $items['ShortDescription'],
                    'product_weight'=> $items['Weight'],
                    'product_shipping_weight'=> $items['ShippingWeight'],
                    'product_weightOz' => $items['ShippingWeight'],
                    'product_package_weightLbs' => $items['PackageWeightLbs'],
                    'product_company_id' => $items['CompanyID'],
                    'product_brand_id' => $items['BrandID'],
                    //'product_type' => $items['ProductType'],
                    'product_condition' => $items['ProductConditionName'],
                    'product_upc' => $items['UPC'],
                    'product_cost_price' => $items['VendorPrice'],
                    'product_map_price' => $items['MAPPrice'],
                    'product_msrp_price' => $items['VendorPrice'],
                ]);

            //End Product saving

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://ch.api.sellercloud.com/rest/api/ProductImage?productID='.$items['ID'].'',
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
                $totalImages =count($catalogs);
                if ($totalImages > 0){
                //    return $catalogs[0];
                for ($i=0; $i< $totalImages; $i++){
                    $index = $i + 1;
                    $image = Image::where('product_sku' , '=',$items['ID'])->first();

                    // $img = "img$index";
                    if (!empty($image)){
                        $image->update(array(
                            "img$index" => $catalogs[$i]['Url'],
                        ));
                    }
                    else{
                         $image =  Image::create([
                             'product_sku' => $items['ID'],
                             'image_id' => $catalogs[$i]['ImageID'],
                             'product_id' => $new_product->id,
                             "img$index" =>$catalogs[$i]['Url'],
                         ]);

                    }
//                    echo $totalImages . "($i)" . "<br>";
//                    echo $catalogs[$i]['Url'] .'======'."img$index";
                }
                }


            }
            }


        // End saving
//        echo "<pre>";print_r($catalogs['Items'][12]);
//        echo "</pre>";
    }

    public function product_items(){
        token_expire();
        $number = 4;
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
        //$productItems = $catalogs['TotalResults'];
//        return $catalogs['Items'][1];
        //Saving product to Db

        foreach ($catalogs['Items'] as $items){
            $types = array("BathFaucet", "TUB", "Mirrors", "TUBFAUCETS","KitchenFaucet");
            $product_type = $items['ProductType'];
            if (in_array($product_type , $types)){
                $new_category = Category::firstOrCreate([
                    'name' => $items['ProductType']
                ]);

                //Saving images

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://ch.api.sellercloud.com/rest/api/ProductImage?productID='.$items['ID'].'',
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
                $totalImages =count($catalogs);
                if ($totalImages > 0){
                    //    return $catalogs[0];
                    for ($i=0; $i< $totalImages; $i++){
                        $index = $i + 1;
                        $image = Image::where('product_sku' , '=',$items['ID'])->first();

                        // $img = "img$index";
                        if (!empty($image)){
                            $image->update(array(
                                "img$index" => $catalogs[$i]['Url'],
                            ));
                        }
                        else{
                            $image =  Image::create([
                                'product_sku' => $items['ID'],
                                'image_id' => $catalogs[$i]['ImageID'],
                                "img$index" =>$catalogs[$i]['Url'],
                            ]);

                        }
//                    echo $totalImages . "($i)" . "<br>";
//                    echo $catalogs[$i]['Url'] .'======'."img$index";
                    }
                }

                //End saving images
                //Product saving
                $new_product = Product::create([
                    'sku' => $items['ID'],
                    'product_name' => $items['ProductName'],
                    'product_image' => $items['ImageUrl'],
                    'category_id'  => $new_category->id,
                    'product_short_desc'=>$items['ShortDescription'],
                    'product_long_desc' => $items['ShortDescription'],
                    'product_weight'=> $items['Weight'],
                    'product_shipping_weight'=> $items['ShippingWeight'],
                    'product_weightOz' => $items['ShippingWeight'],
                    'product_package_weightLbs' => $items['PackageWeightLbs'],
                    'product_company_id' => $items['CompanyID'],
                    'product_brand_id' => $items['BrandID'],
                    //'product_type' => $items['ProductType'],
                    'product_condition' => $items['ProductConditionName'],
                    'product_upc' => $items['UPC'],
                    'product_cost_price' => $items['VendorPrice'],
                    'product_map_price' => $items['MAPPrice'],
                    'product_msrp_price' => $items['VendorPrice'],
                    'image_id' => $image->id,
                ]);

                //End Product saving




            }
        }


        // End saving
//        echo "<pre>";print_r($catalogs['Items'][12]);
//        echo "</pre>";
    }
    public function testPassword(){
        return view('test-password');
    }
}
