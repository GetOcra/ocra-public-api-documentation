# Reservation intake API

The reservation intake API allows ORPs to sync reservation data in real time with Ocra. 

`need to get address for staging REST API`
https://staging.restapi.com/reservations/:organizationId:/:locationId:


Example REST/JSON Request Body: 

```JSON
    {
        apiKey            : "a932b1514d03424da11d3f57cb80240c",
        transactionID  : "4d03",
        transactionDate: "2021-10-05T14:48:00.000Z",
        startDate      : "2021-10-05T15:00:00.000Z", 
        endDate        : "2021-10-05T16:00:00.000Z",
        licensePlate   : "AAA-111",
        status         : "valid",
        grossRevenue   : 23.01,
        netRevenue     : 20.25,
        productType    : "covered",
        categoryType   : "daily",
        barcode        : "123556469764513"
    }
```


# Request parameters

|param          |type           |required|description|
|-----          |----           |--------|-----------|
|apiKey         |string         |yes     | API key provided by Ocra|
|transactionDate|DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the transaction/reservation occurred in your system|
|transactionID  |string         |yes     | Your systems transaction/reservation ID|
|locationId     |string         |yes     | The id for the location of the lot or location in your system|
|startDate      |DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the reservation starts from|
|endDate        |DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the reservation ends|
|licensePlate   |string         |no      | The vehicle license plate|
|status         |status string  |yes     | ["valid","completed","cancelled","refunded"]|
|grossRevenue   |float     |yes     | gross revenue in usd without currency mark|
|netRevenue     |float     |yes     | net revenue in usd without currency mark|
|productType    |product string |yes     | ["self","valet"]|
|categoryType   |category string|yes     | ["daily","monthly","airport"]|
|barcode        |string         |no      | value of barcode used with reservation|

# Response Parameters

```JSON
  {
      success:true,
      locationId:"kjhskfdjh-iuhwrensdd-9866345",
      startDate:"2021-10-05T15:00:00.000Z",
      endDate:"2021-10-05T16:00:00.000Z",
      status:"valid"
  }

```

You may request any/all of the fields from the above request parameters to validate the request completed correctly, and/or just the success field

|param          |type           |description|
|-----          |----           |-----------|
|success        |bool           |`true`/`false` bool as to wether or not the request succeded|

# Error Response

This is an example Erorr response. 

***We need to flesh out what all of the error types we provide are and put them in a seperate document for API Errors instead of in this doc***

```js

{
  "error": {
    "errors": [
      {
        "code": "400",
        "message": "Context creation failed: auth/argument-error",
        "data": {
          "errorInfo": {
            "code": "auth/argument-error",
            "message": "Firebase ID token has \"kid\" claim which does not correspond to a known public key. Most likely the ID token is expired, so get a fresh token from your client app and try again."
          },
          "codePrefix": "auth",
          "code": "400",
          "exception": {
            "stacktrace": [
              "***"
            ]
          }
        }
      }
    ]
  }
}

```