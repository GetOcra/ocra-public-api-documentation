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
const METHOD='POST';

const response = await fetch(
    `${BASE}/transaction/${TRANSACTION_ID}`, 
    {
        headers: HEADERS,
        method: METHOD,
        body:JSON.stringify(
            {
                transactionID  : TRANSACTION_ID,
                transactionDate: '2021-10-05T14:48:00.000Z',
                locationId     : '4557',
                startDate      : '2021-10-05T15:00:00.000Z', 
                endDate        : '2021-10-05T16:00:00.000Z',
                licensePlate   : 'AAA-111',
                grossRevenue   : 23.01,
                netRevenue     : 20.25,
                productType    : 'covered',
                vertical       : 'airport',
                barcode        : '123556469764513'
            }
        )
    }
);

//DEBUG ONLY
console.log(response);
console.log(await response.json());

/*

for response payload see 

https://github.com/GetOcra/ocra-public-api-documentation/blob/main/Transaction.md#example-delete-success-response

*/