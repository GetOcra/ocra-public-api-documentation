# Transaction API

The Transaction API allows ORPs to sync reservation data in real time with Ocra. 

`need to get address for staging REST API`
https://staging.restapi.com/transaction


Example REST/JSON Request Body: 

```JSON
    {
        apiKey         : "a932b1514d03424da11d3f57cb80240c",
        transactionID  : "4d03",
        transactionDate: "2021-10-05T14:48:00.000Z",
        locationId     : "4557",
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
      "reservationsEditOne": {
        "placedDate": "2021-10-05T14:48:00.000Z",
        "startDate": "2021-10-05T15:00:00.000Z",
        "endDate": "2021-10-05T16:00:00.000Z",
        "licensePlate": "AAA-111",
        "status": "valid",
        "grossRevenues": 99.01,
        "netRevenues": 20.25,
        "productType": "self",
        "category": "daily",
        "barcode": "123556469764513",
        "externalId": "4d06"
      },
      "locationId": "45322"
  }

```

You may request any/all of the fields from the above request parameters to validate the request completed correctly, and/or just the success field

|param          |type           |description|
|-----          |----           |-----------|
|reservationsEditOne|object     |updated Ocra Reservation Data|
|locationId         |string     |The id for the location of the lot or location in your system|

# Error Response

This is an example Error response. 

```js

{
  "response": {
    "status": "404",
    "message": "parkinglot not found",
    "errors": [
      {
        "aggregations.seller": "parkwhiz",
        "aggregations.externalId": "45321",
        "state": "integrated",
        "extensions": {
          "aggregations.seller": "parkwhiz",
          "aggregations.externalId": "45321",
          "state": "integrated",
          "code": "404"
        }
      }
    ]
  }
}

------------

{
  "response": {
    "status": "401",
    "message": "Invalid API Key",
    "errors": [
      {
        "_id": "cc85f45e-e0e2-410f-888f-281bc97d8f9",
        "status": "active",
        "extensions": {
          "_id": "cc85f45e-e0e2-410f-888f-281bc97d8f9",
          "status": "active",
          "code": "404"
        }
      }
    ]
  }
}


-------

//bad formatting

{
  "response": {
    "errors": [
      {
        "code": "GRAPHQL_VALIDATION_FAILED",
        "message": "Expected type ProductTypeEnum, found sel. Did you mean the enum value self?",
        "data": {
          "code": "GRAPHQL_VALIDATION_FAILED",
          "exception": {
            "stacktrace": [
              "GraphQLError: Expected type ProductTypeEnum, found sel. Did you mean the enum value self?",
              "    at Object.EnumValue (C:\\Users\\brand\\git\\parkplace\\parkplace-graph\\node_modules\\graphql\\validation\\rules\\ValuesOfCorrectType.js:112:29)",
              "    at Object.enter (C:\\Users\\brand\\git\\parkplace\\parkplace-graph\\node_modules\\graphql\\language\\visitor.js:324:29)",
              "    at Object.enter (C:\\Users\\brand\\git\\parkplace\\parkplace-graph\\node_modules\\graphql\\language\\visitor.js:375:25)",
              "    at visit (C:\\Users\\brand\\git\\parkplace\\parkplace-graph\\node_modules\\graphql\\language\\visitor.js:242:26)",
              "    at Object.validate (C:\\Users\\brand\\git\\parkplace\\parkplace-graph\\node_modules\\graphql\\validation\\validate.js:73:24)",
              "    at validate (C:\\Users\\brand\\git\\parkplace\\parkplace-graph\\node_modules\\apollo-server-core\\src\\requestPipeline.ts:536:14)",
              "    at Object.<anonymous> (C:\\Users\\brand\\git\\parkplace\\parkplace-graph\\node_modules\\apollo-server-core\\src\\requestPipeline.ts:302:32)",
              "    at Generator.next (<anonymous>)",
              "    at fulfilled (C:\\Users\\brand\\git\\parkplace\\parkplace-graph\\node_modules\\apollo-server-core\\dist\\requestPipeline.js:5:58)",
              "    at runMicrotasks (<anonymous>)"
            ]
          }
        }
      }
    ],
    "status": 400,
    "headers": {}
  },
  "request": {
    "query": "\n            mutation{\n                reservationsEditOne(  \n                        id:\"fd4dd20c-0003-4b84-aade-17acf99ada19\", \n                        input: { \n                            parkingLotId: \"d1c654b0-cfa2-4d7b-81c0-5fec7e731f5d\", \n                            placedDate:\"2021-10-05T14:48:00.000Z\",\n                            startDate: \"2021-10-05T15:00:00.000Z\", \n                            endDate: \"2021-10-05T16:00:00.000Z\", \n                            licensePlate: \"AAA-111\",\n                            status:valid,\n                            grossRevenues: 99.01,\n                            netRevenues: 20.25,\n                            productType: sel,\n                            category: daily,\n                            barcode: \"123556469764513\",\n                            seller:parkwhiz,\n                            externalId:\"4d06\"\n                        }\n                    \n                ){\n                    placedDate\n                    startDate\n                    endDate\n                    licensePlate\n                    status\n                    grossRevenues\n                    netRevenues\n                    productType\n                    category\n                    barcode\n                    externalId\n                }\n            }\n        "
  }
}

```
