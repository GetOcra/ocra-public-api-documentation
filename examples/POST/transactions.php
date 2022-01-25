<?php
    $TRANSACTION_ID='4d03';
    $BASE = 'https://api.stage.getocra.com';
    $HEADERS = array(
        'content-type: application/json',
        'Authorization: YOUR_API_KEY_HERE',
    );
    $BODY = array(
        'transactionID' => $TRANSACTION_ID,
        'transactionDate' => '2021-10-05T14:48:00.000Z',
        'locationId' => '4557',
        'startDate' => '2021-10-05T15:00:00.000Z', 
        'endDate' => '2021-10-05T16:00:00.000Z',
        'licensePlate' => 'AAA-111',
        'grossRevenue' => 23.01,
        'netRevenue' => 20.25,
        'productType' => 'covered',
        'vertical' => 'airport',
        'barcode' => '123556469764513'
    );
        
        
    $request = curl_init();
    curl_setopt($request, CURLOPT_URL, "{$BASE}/transaction/{$TRANSACTION_ID}");
    curl_setopt($request, CURLOPT_HTTPHEADER, $HEADERS);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $BODY);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

    //FOR DEBUG ONLY
    curl_setopt($request, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($request);
    curl_close($request);
    
    var_dump($response);   

    /*

    for response payload see 

    https://github.com/GetOcra/ocra-public-api-documentation/blob/main/Transaction.md#example-delete-success-response

    */
?>