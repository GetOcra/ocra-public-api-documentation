# Reservations API

The Reservations API allows ORPs to sync reservation data in real time with Ocra. 

Staging URL:
```
https://partners.stage.getocra.com
```

Production URL:
```
https://partners.getocra.com
```

## Headers for All Requests
|Header|value|description|
|---|---|---|
|x-api-key|API Key|Your API Key|
|content-type|application/json|content type of payload and response|

## Request/Response Overview
| Method | description                                                                |
|--------|----------------------------------------------------------------------------|
| POST   | upsert reservation into Ocra system, this will set the `status` to `valid` |
| DELETE | set reservation `status` to `cancelled`                                    |
| GET    | fetch reservation(s)                                                       |

## POST Reservation:
`POST /v1/reservations`

Create a reservation in our system 

### Request Parameters

| param            |type           |required| description                                                                                                                                                                                                                                                                                                                                                                                                                                                                   |create-only|
|------------------|----           |--------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-----------|
| sourceLocationID |string         |yes     | The id for the location of the lot or location in your system                                                                                                                                                                                                                                                                                                                                                                                                                 |yes|
| reservationID    |string         |yes     | Your systems reservation ID                                                                                                                                                                                                                                                                                                                                                                                                                                                   |yes| 
| reservationTime  |DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the reservation occurred in your system                                                                                                                                                                                                                                                                                                                                                                                                                      |no|| sourceLocationID |string         |yes     | The id for the location of the lot or location in your system                                                                                                                                                                                                                                                                                                                                                                                                                 |yes|
| startTime        |DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the reservation starts from                                                                                                                                                                                                                                                                                                                                                                                                                                  |no|
| endTime          |DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString)|yes     | ISO8601 DateTime the reservation ends                                                                                                                                                                                                                                                                                                                                                                                                                                         |no|
| licensePlate     |string         |no      | The vehicle license plate                                                                                                                                                                                                                                                                                                                                                                                                                                                     |no|
| grossRevenue     |float     |yes     | gross revenue in usd without currency mark                                                                                                                                                                                                                                                                                                                                                                                                                                    |no|
| netRevenue       |float     |yes     | net revenue in usd without currency mark                                                                                                                                                                                                                                                                                                                                                                                                                                      |no|
| productType      |product string |yes     | ['self_uncovered', 'self_covered', 'self_rooftop', 'self_indoor', 'valet_uncovered', 'valet_covered', 'valet_indoor', 'garage_ground_floor', 'self_curbside', 'valet_rooftop', 'valet_curbside', 'self_uncovered_oversized', 'self_covered_oversized', 'self_indoor_oversized', 'self_rooftop_oversized', 'self_curbside_oversized', 'valet_uncovered_oversized', 'valet_covered_oversized', 'valet_indoor_oversized', 'valet_rooftop_oversized', 'valet_curbside_oversized'] |yes|
| vertical         |category/vertical string|yes     | ["airport","event","transient","monthly"]                                                                                                                                                                                                                                                                                                                                                                                                                                     |yes|
| barcode          |string         |no      | value of barcode used with reservation                                                                                                                                                                                                                                                                                                                                                                                                                                        |no|

### Example Post Request Payload

```js
    {
        sourceLocationID : "4557",
        reservationID    : "4d03",
        reservationTime  : "2021-10-05T14:48:00.000Z",
        startTime        : "2021-10-05T15:00:00.000Z", 
        endTime          : "2021-10-05T16:00:00.000Z",
        licensePlate     : "AAA-111",
        grossRevenue     : 23.01,
        netRevenue       : 20.25,
        productType      : "covered",
        vertical         : "airport",
        barcode          : "123556469764513"
    }
```

### Example POST Success Response

```js

Status code 200

  {
        sourceLocationID : "4557",
        status           : "valid",
        reservationID    : "4d03",
        reservationTime  : "2021-10-05T14:48:00.000Z",
        startTime        : "2021-10-05T15:00:00.000Z", 
        endTime          : "2021-10-05T16:00:00.000Z",
        licensePlate     : "AAA-111",
        grossRevenue     : 23.01,
        netRevenue       : 20.25,
        productType      : "covered",
        vertical         : "airport",
        barcode          : "123556469764513",
        updatedTime      : "2021-10-05T15:43:11.024Z"
  }

```

## DELETE Reservation:

`DELETE /v1/reservations/:your_reservation_id`

This will not delete the reservation, but instead set its status to `cancelled` in our system.

### Example DELETE Success Response

```js

Status code 200

  {
        sourceLocationID : "4557",
        status           : "cancelled",
        reservationID    : "4d03",
        reservationTime  : "2021-10-05T14:48:00.000Z",
        startTime        : "2021-10-05T15:00:00.000Z", 
        endTime          : "2021-10-05T16:00:00.000Z",
        licensePlate     : "AAA-111",
        grossRevenue     : 23.01,
        netRevenue       : 20.25,
        productType      : "covered",
        vertical         : "airport",
        barcode          : "123556469764513"
        updatedTime      : "2021-10-05T15:43:11.024Z"
  }

```

## GET Reservation(s):
`GET /v1/reservations?{query}`

Fetch reservation(s)

### Query Parameters

| **Parameter**      | **Type**            | **Description**                                                                                                                          | **Required** |
|--------------------|---------------------|------------------------------------------------------------------------------------------------------------------------------------------|--------------|
| ocra_location_id   | alphanumerical      | Location identifier in Ocra's system                                                                                                     | yes          |
| license_plate      | alphanumerical      | License plate                                                                                                                            | no           |
| reservation_id     | alphanumerical      | Unique reservation ID, can be matched with starting characters                                                                           | no           |
| product_type       | text                | Product types: `self_uncovered`, `self_covered`, `self_rooftop`, `self_indoor`, `valet_uncovered`, `valet_covered`, `valet_indoor`, etc. | no           |
| first_name         | text                | First name                                                                                                                               | no           |
| last_name          | text                | Last name                                                                                                                                | no           |
| start_date         | DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString) | Reservation falls after start date                                                                                                       | no           |
| end_date           | DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString) | Reservation falls before end date                                                                                                        | no           |
| reservation_date   | DateTime [ISO8601](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toISOString) | Reservation transacted on date                                                                                                           | no           |
| updated_date_start | UTC DateTime ISO8601 | Beginning timestamp for reservation update filter                                                                                        | no           |
| updated_date_end   | UTC DateTime ISO8601 | Ending timestamp for reservation update filter                                                                                           | no           |