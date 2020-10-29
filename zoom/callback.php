<?php
require_once 'config.php';
  
try {
    $client = new GuzzleHttp\Client(['base_uri' => 'https://zoom.us']);
 
    $response = $client->request('POST', '/oauth/token', [
        "headers" => [
            "Authorization" => "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IlkzVXBDdlJwUk0tLW02SEVBXzBTcFEiLCJleHAiOjE2OTUxMzM1MDAsImlhdCI6MTYwMDUyMDE3NH0.HvS3uZoI2bmBOhKkkGijlPTw8JyjEFEnsf_O2zyROvE"
        ],
        'form_params' => [
            "grant_type" => "authorization_code",
            "code" => $_GET['code'],
            "redirect_uri" => REDIRECT_URI
        ],
    ]);
 
    $token = json_decode($response->getBody()->getContents(), true);
 
    $db = new DB();
 
    if($db->is_table_empty()) {
        $db->update_access_token(json_encode($token));
        echo "Access token inserted successfully.";
    }
} catch(Exception $e) {
    echo $e->getMessage();
}