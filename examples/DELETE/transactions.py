import requests;

TRANSACTION_ID='4d03'
BASE = 'https://api.stage.getocra.com'
HEADERS = {
    'content-type': 'application/json',
    'Authorization': 'YOUR_API_KEY_HERE'
}

response = requests.delete(
    f'{BASE}/transactions/{TRANSACTION_ID}', 
    headers=HEADERS
)

#debug only
print(response)
print(response.json())

## for response payload see 
## https://github.com/GetOcra/ocra-public-api-documentation/blob/main/Transaction.md#example-get-success-response