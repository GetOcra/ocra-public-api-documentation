# Transaction API

The Transaction API allows Online Reservation Partners to sync reservation data in real time with Ocra. 

Staging Endpoint : :

```
https://api.stage.getocra.com
```

Production Endpoint : 

```
https://api.getocra.com
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

|param          |type           |required|description|create-only|
|-----          |----           |--------|-----------|-----------|
|status         | status string | ["valid", "cancelled"] READ ONLY, updates to valid on any POST request. To set to cancelled, call the [DELETE method](#delete-examples)|
|transactionDate|DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the transaction/reservation occurred in your system|no|
|transactionID  |string         |yes     | Your systems transaction/reservation ID|yes|
|locationID     |string         |yes     | The id for the location of the lot or location in your system|yes|
|startDate      |DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the reservation starts from|no|
|endDate        |DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the reservation ends|no|
|licensePlate   |string         |no      | The vehicle license plate|no|
|grossRevenue   |float     |yes     | gross revenue in usd without currency mark|no|
|netRevenue     |float     |yes     | net revenue in usd without currency mark|no|
|productType    |product string |yes     | ['self_uncovered', 'self_covered', 'self_rooftop', 'self_indoor', 'valet_uncovered', 'valet_covered', 'valet_indoor', 'garage_ground_floor', 'self_curbside', 'valet_rooftop', 'valet_curbside', 'self_uncovered_oversized', 'self_covered_oversized', 'self_indoor_oversized', 'self_rooftop_oversized', 'self_curbside_oversized', 'valet_uncovered_oversized', 'valet_covered_oversized', 'valet_indoor_oversized', 'valet_rooftop_oversized', 'valet_curbside_oversized']|yes|
|vertical       |category/vertical string|yes     | ["airport","event","transient","monthly"]|yes|
|barcode        |string         |no      | value of barcode used with reservation|no|

### Example Post JSON Request Payload

```js
    {
        transactionID  : "4d03",
        transactionDate: "2021-10-05T14:48:00.000Z",
        locationID     : "4557",
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
|status         | status string | ["valid", "cancelled"] read only|
|transactionDate|DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the transaction/reservation occurred in your system|
|transactionID  |string         | Your systems transaction/reservation ID|
|locationID     |string         | The id for the location of the lot or location in your system|
|startDate      |DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the reservation starts from|
|endDate        |DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the reservation ends|
|licensePlate   |string         | The vehicle license plate|
|grossRevenue   |float     | gross revenue in usd without currency mark|
|netRevenue     |float     | net revenue in usd without currency mark|
|productType    |product string | ['self_uncovered', 'self_covered', 'self_rooftop', 'self_indoor', 'valet_uncovered', 'valet_covered', 'valet_indoor', 'garage_ground_floor', 'self_curbside', 'valet_rooftop', 'valet_curbside', 'self_uncovered_oversized', 'self_covered_oversized', 'self_indoor_oversized', 'self_rooftop_oversized', 'self_curbside_oversized', 'valet_uncovered_oversized', 'valet_covered_oversized', 'valet_indoor_oversized', 'valet_rooftop_oversized', 'valet_curbside_oversized']|
|vertical       |category/vertical string|yes     | ["airport","event","transient","monthly"]|
|barcode        |string         | value of barcode used with reservation|

```js

Status code 200

  {
        status         : "valid",
        transactionID  : "4d03",
        transactionDate: "2021-10-05T14:48:00.000Z",
        locationID     : "4557",
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

Status code 403

------------

Status code 401

------------

Status code 500

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
        locationID     : "4557",
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

Status code 403

------------

Status code 401

------------

Status code 500

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
        locationID     : "4557",
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

Status code 403

------------

Status code 401

------------

Status code 500

```
