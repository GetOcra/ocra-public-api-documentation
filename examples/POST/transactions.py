import requests;
import json;

TRANSACTION_ID='4d03'
BASE = 'https://api.stage.getocra.com'
HEADERS = {
    'content-type': 'application/json',
    'Authorization': 'YOUR_API_KEY_HERE'
}

response = requests.post(
    f'{BASE}/transaction', 
    headers=HEADERS,
    data=json.dumps(
        {
            transactionID  : TRANSACTION_ID,
            transactionDate: '2021-10-05T14:48:00.000Z',
            locationID     : '4557',
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
)

#debug only
print(response)
print(response.json())

## for response payload see 
## https://github.com/GetOcra/ocra-public-api-documentation/blob/main/Transaction.md#example-get-success-response