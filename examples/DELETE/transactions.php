<?php
    $TRANSACTION_ID='4d03';
    $BASE = 'https://api.stage.getocra.com';
    $HEADERS = array(
        'content-type: application/json',
        'Authorization: YOUR_API_KEY_HERE',
    );
    $METHOD = 'DELETE';
        
        
    $request = curl_init();
    curl_setopt($request, CURLOPT_URL, "{$BASE}/transaction/{$TRANSACTION_ID}");
    curl_setopt($request, CURLOPT_HTTPHEADER, $HEADERS);
    curl_setopt($request, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

    //FOR DEBUG ONLY
    curl_setopt($request, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($request);
    curl_close($request);
    
    var_dump($response);   
?>