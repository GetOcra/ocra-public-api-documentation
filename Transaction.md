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

# EXAMPLE Headers for All Requests

|Header|value|description|
|---|---|---|
|Authorization|API Key|Your API Key|
|content-type|application/json|content type of payload and response|

POST Examples:

|type|link|
|---|---|
|PHP| coming soon |
|javascript| coming soon |
|python| coming soon |

Example POST JSON Request Body: 

```JSON
    {
        apiKey         : "a932b1514d03424da11d3f57cb80240c",
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


# Request Payload

|param          |type           |required|description|
|-----          |----           |--------|-----------|
|apiKey         |string         |yes     | API key provided by Ocra|
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

# Example POST Success Response

```js

Status code 200

  {

  }

```

# Example POST Error Response

This is an example Error response. 

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

GET Examples:

|type|link|
|---|---|
|PHP| coming soon |
|javascript| coming soon |
|python| coming soon |


# Example GET Success Response

```js

Status code 200

  {

  }

```



# Example GET Error Response

This is an example Error response. 

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


GET Examples:

|type|link|
|---|---|
|PHP| coming soon |
|javascript| coming soon |
|python| coming soon |


# Example GET Success Response

```js

Status code 200

  {

  }

```



# Example DELETE Error Response

This is an example Error response. 

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
