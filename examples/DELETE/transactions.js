/*
if running on node,

import fetch from 'node-fetch';
*/

const TRANSACTION_ID='4d03';
const BASE = 'https://api.stage.getocra.com';
const HEADERS = {
    'content-type': 'application/json',
    'Authorization': 'YOUR_API_KEY_HERE'
};
const METHOD='DELETE';

const response = await fetch(
    `${BASE}/transactions/${TRANSACTION_ID}`, 
    {
        headers: HEADERS,
        method: METHOD,
    }
);

//DEBUG ONLY
console.log(response);
console.log(await response.json());

/*

for response payload see 

https://github.com/GetOcra/ocra-public-api-documentation/blob/main/Transaction.md#example-delete-success-response

*/