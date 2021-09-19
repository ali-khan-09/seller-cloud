<?php
use Carbon\Carbon;
function generate_access_token(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ch.api.sellercloud.com/rest/api/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
       "Username":"'.env("USER_EMAIL").'",
       "Password": "'.env("USER_PASSWORD").'"
     }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response=json_decode($response);
//        print_r($response);

        // SAVING TOKEN & TIME IN SESSION

        $access_token =  session()->put('access_token' , $response->access_token);
        $expires_in   =  session()->put('expires_in' , $response->expires_in);
        $issue_time   =  session()->put('issue', Now());
    }
//    CHECKING IF THE TOKEN IS EXPIRE OR NOT
function token_expire(){
    $access_token = session()->get('access_token');
    if ($access_token == null){
       generate_access_token();
    }
    else{
     $expire_in = session()->get('expires_in');
     $issue_in = session()->get('issue');
     $current_time = Carbon::now();
     $timeDiff = $issue_in->diffInSeconds($current_time);
    if( $timeDiff > 3500){
        generate_access_token();
    }
    else{
         return $access_token;
    }
    }
}

function getSingleProduct($sku){
    return $product = \App\Models\Product::where('product_id' , $sku)->get();
}
function getSingleSellerCloudProduct($sku){
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
}

