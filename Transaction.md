# Transaction API

The Transaction API allows ORPs to sync reservation data in real time with Ocra. 

Staging Endpoint : 

```
coming soon
```

Production Endpoint : 

```
coming soon
```

## EXAMPLE Headers for All Requests

|Header|value|description|
|---|---|---|
|Authorization|API Key|Your API Key|
|content-type|application/json|content type of payload and response|

## Request/Response Examples

|Method|description|
|---|---|
|[POST](#post-examples)|upsert transaction into Ocra system, this will set the `.status` to `valid`|
|[GET](#get-examples)|fetch transaction from Ocra system|
|[DELETE](#delete-examples)|set transaction `.status` to `cancelled`|

# POST Examples:

`/transactions`

|type|link|
|---|---|
|javascript| [examples/POST/transactions.js](./examples/POST/transactions.js) |
|python| [examples/POST/transactions.py](./examples/POST/transactions.py) |
|PHP| [examples/POST/transactions.php](./examples/POST/transactions.php) |

### POST Request Payload

|param          |type           |required|description|
|-----          |----           |--------|-----------|
|transactionDate|DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the transaction/reservation occurred in your system|
|transactionID  |string         |yes     | Your systems transaction/reservation ID|
|locationId     |string         |yes     | The id for the location of the lot or location in your system|
|startDate      |DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the reservation starts from|
|endDate        |DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the reservation ends|
|licensePlate   |string         |no      | The vehicle license plate|
|grossRevenue   |float     |yes     | gross revenue in usd without currency mark|
|netRevenue     |float     |yes     | net revenue in usd without currency mark|
|productType    |product string |yes     | [to be defined]|
|vertical       |category/vertical string|yes     | ["airport","event","transient","monthly"]|
|barcode        |string         |no      | value of barcode used with reservation|

### Example Post JSON Request Payload

```js
    {
        transactionID  : "4d03",
        transactionDate: "2021-10-05T14:48:00.000Z",
        locationId     : "4557",
        startDate      : "2021-10-05T15:00:00.000Z", 
        endDate        : "2021-10-05T16:00:00.000Z",
        licensePlate   : "AAA-111",
        grossRevenue   : 23.01,
        netRevenue     : 20.25,
        productType    : "covered",
        vertical       : "airport",
        barcode        : "123556469764513"
    }
```

### Example POST Success Response

|param          |type           |description|
|-----          |----           |-----------|
|status         | status string | ["valid" | "cancelled"] read only|
|transactionDate|DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the transaction/reservation occurred in your system|
|transactionID  |string         | Your systems transaction/reservation ID|
|locationId     |string         | The id for the location of the lot or location in your system|
|startDate      |DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the reservation starts from|
|endDate        |DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the reservation ends|
|licensePlate   |string         | The vehicle license plate|
|grossRevenue   |float     | gross revenue in usd without currency mark|
|netRevenue     |float     | net revenue in usd without currency mark|
|productType    |product string | [to be defined]|
|vertical       |category/vertical string|yes     | ["airport","event","transient","monthly"]|
|barcode        |string         | value of barcode used with reservation|

```js

Status code 200

  {
        status         : "valid",
        transactionID  : "4d03",
        transactionDate: "2021-10-05T14:48:00.000Z",
        locationId     : "4557",
        startDate      : "2021-10-05T15:00:00.000Z", 
        endDate        : "2021-10-05T16:00:00.000Z",
        licensePlate   : "AAA-111",
        grossRevenue   : 23.01,
        netRevenue     : 20.25,
        productType    : "covered",
        vertical       : "airport",
        barcode        : "123556469764513"
  }

```

### Example POST Error Response

```js

Status code 404

{
  
}

------------

Status code 401

{
  
}

------------

Status code 500

{
  
}



```

# GET Examples:

`/transactions/:your_transaction_id`

|type|link|
|---|---|
|javascript| [examples/GET/transactions.js](./examples/GET/transactions.js) |
|python| [examples/GET/transactions.py](./examples/GET/transactions.py) |
|PHP| [examples/GET/transactions.php](./examples/GET/transactions.php) |


### GET Response Payload

See POST Response table above for definitions of response fields

### Example GET Success Response

```js

Status code 200

  {
        status         : "valid",
        transactionID  : "4d03",
        transactionDate: "2021-10-05T14:48:00.000Z",
        locationId     : "4557",
        startDate      : "2021-10-05T15:00:00.000Z", 
        endDate        : "2021-10-05T16:00:00.000Z",
        licensePlate   : "AAA-111",
        grossRevenue   : 23.01,
        netRevenue     : 20.25,
        productType    : "covered",
        vertical       : "airport",
        barcode        : "123556469764513"
  }

```



### Example GET Error Response

```js

Status code 404

{
  
}

------------

Status code 401

{
  
}

------------

Status code 500

{
  
}



```


# DELETE Examples:

`/transactions/:your_transaction_id`

This will not delete the transaction, but instead set its status to cancelled in our system.

|javascript| [examples/DELETE/transactions.js](./examples/DELETE/transactions.js) |
|python| [examples/DELETE/transactions.py](./examples/DELETE/transactions.py) |
|PHP| [examples/DELETE/transactions.php](./examples/DELETE/transactions.php) |


### DELETE Response Payload

See POST Response table above for definitions of response fields

### Example DELETE Success Response

```js

Status code 200

  {
        status         : "cancelled",
        transactionID  : "4d03",
        transactionDate: "2021-10-05T14:48:00.000Z",
        locationId     : "4557",
        startDate      : "2021-10-05T15:00:00.000Z", 
        endDate        : "2021-10-05T16:00:00.000Z",
        licensePlate   : "AAA-111",
        grossRevenue   : 23.01,
        netRevenue     : 20.25,
        productType    : "covered",
        vertical       : "airport",
        barcode        : "123556469764513"
  }

```


### Example DELETE Error Response 

```js

Status code 404

{
  
}

------------

Status code 401

{
  
}

------------

Status code 500

{
  
}



```
