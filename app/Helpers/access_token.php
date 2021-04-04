<?php
function generate_access_token(){
    session()->forget('access_token');
    if (!session()->has('access_token')){
        session_start();
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
//        unset($_SESSION);
//    $_SESSION['access_token'] = $response->access_token;
//    $_SESSION['expires_in'] = $response->expires_in;
//    $_SESSION['issue'] = now();
        $access_token =  session()->put('access_token' , $response->access_token);
        $expires_in   =  session()->put('expires_in' , $response->expires_in);
        $issue_time   =  session()->put('issue', Now());
    }
}
