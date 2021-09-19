<?php

use App\Models\Product;

//function totalPageNumber(){
//    generate_access_token();
//    $number = 1;
//    $curl = curl_init();
//    curl_setopt_array($curl, array(
//        CURLOPT_URL => 'https://ch.api.sellercloud.com/rest/api/Catalog?model.companyID=198&model.companyID=187&model.companyID=183&model.pageNumber='.$number.'&model.pageSize=50',
//        CURLOPT_RETURNTRANSFER => true,
//        CURLOPT_ENCODING => '',
//        CURLOPT_MAXREDIRS => 10,
//        CURLOPT_TIMEOUT => 0,
//        CURLOPT_FOLLOWLOCATION => true,
//        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//        CURLOPT_CUSTOMREQUEST => 'GET',
//        CURLOPT_HTTPHEADER => array(
//            'Content-Type: application/json',
//            'Authorization: Bearer '.session()->get('access_token').''
//        ),
//    ));
//
//    $response = curl_exec($curl);
//
//    curl_close($curl);
//    $catalogs=json_decode($response,true);
//    $PageNumber = $catalogs['TotalResults'];
//
//    return $totalPageNumber = round($PageNumber);
//}
//
////Get single Product
//function getSingleProduct($sku){
//    return $product = Product::where('product_id' ,'=', $sku)->get();
//}
