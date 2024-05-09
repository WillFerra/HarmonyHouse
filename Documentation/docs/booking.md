# Booking
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create Booking
Creates a new row in the Booking Table.

Link: http://localhost:8888/HarmonyHouse/api/bookings/createBooking.php

    Variables Required:
    * userId
    * seatId
    * eventId
    * paymentTerms

    Possible Responses:
    * Booking Created - API worked as expected and a new booking was created in the database.
    * Booking Not Created - An error occured and the Booking was not created.

    Sample Input:
        {
            "userId":"3",
            "seatId":"4",
            "eventId":"4",
            "paymentTerms":"1"
        }

## Delete Booking
Deletes a row from the Booking Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/bookings/deleteBooking.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * Booking Deleted - API worked as expected and the booking with the entered id was deleted from the database.
    * Booking Not Deleted - An error occured and the Booking was not deleted.

## Get Bookings
Gets and displays all the Bookings stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/bookings/getBookings.php

    Variables Required:
    * None

    Possible Responses:
    * Booking details of all the bookings in the database.
    * Error Message - An error occured and the user id entered was not found.

## Get Booking By Id
Gets and displays a row from the Booking Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/bookings/getBookingById.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The Booking Details relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get Bank By EventId
Gets and displays the rows from the Booking Table according to the event id entered. Displays all the bookings for the event.

Link: http://localhost:8888/HarmonyHouse/api/bookings/getBookingsByEventId.php?eventId={eventId}

    Variables Required:
    * eventId

    Possible Responses:
    * The Booking Details relating to the entered event id
    * Error Message - An error occured and the eventid entered was not found.

## Get Bank By UserId
Gets and displays the rows from the Booking Table according to the user id entered. Displays all the bookings done by the user with the entered id.

Link: http://localhost:8888/HarmonyHouse/api/bookings/getBookingsByUserId.php?userId={userId}

    Variables Required:
    * userId

    Possible Responses:
    * The Booking Details relating to the entered user id
    * Error Message - An error occured and the eventid entered was not found.

## Update Booking
Lets user update a row in the booking table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/bookings/updateBooking.php

    Variables Required:
    * Id
    * userId
    * seatId
    * eventId
    * paymentTerms

    Possible Responses:
    * Booking Updated - API worked as expected and the booking with the entered id was updated in the database.
    * Booking Not Updated - An error occured and the Booking was not updated.

    Sample Input
        {
            "id":"1",
            "userId":"1",
            "seatId":"2",
            "eventId":"1",
            "paymentTerms":"1"
        }


