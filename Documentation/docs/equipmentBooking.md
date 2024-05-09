# Equipment Booking
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create Equipment Booking
Creates a new row in the Equipment Booking Table.

Link: http://localhost:8888/HarmonyHouse/api/equipmentBookings/createEquipBooking.php

    Variables Required
    * eventId
    * equipmentId
    * bookingId
    * paymentTerms

    Possible Responses
    * Equipment Booking Created - API worked as expected and a new equipment booking was created in the database.
    * Equipment Booking Not Created - An error occured and the Equipment Booking was not created.

    Sample Input:
    {
        "eventId":"1",
        "equipmentId":"1",
        "bookingId":"2",
        "paymentTerms":"4"
    }

## Delete Equipment Booking
Deletes a row from the Equipment Booking Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/equipmentBookings/deleteEquipBooking.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * Equipment Booking Deleted - API worked as expected and the equipment booking with the entered id was deleted from the database.
    * Equipment Booking Not Deleted - An error occured and the Equipment was not deleted.

## Get Equipment Bookings
Gets and displays all the Equipment Bookings stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/equipmentBookings/getEquipmentBookings.php

    Variables Required:
    * None

    Possible Responses:
    * Equipment Booking details of all the equipment bookings in the database.
    * Error Message - An error occured and the user id entered was not found.

## Get Equipment Booking By Id
Gets and displays a row from the Equipment Booking Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/equipmentBookings/getEquipBookingByID.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The Equipment Booking Details relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get Equipment By Event Id
Gets and displays the rows from the Equipment Booking Table with matching event Id

Link: http://localhost:8888/HarmonyHouse/api/equipmentBookings/getEquipBookingByEventId.php?eventId={eventId}

    Variables Required:
    * EventId

    Possible Responses:
    * Equipment Booking details of all the Equipment Booking with a matching event id with that entered.
    * Error Message - An error occured and the event id entered was not found.

## Get Equipment By Equipment Id
Gets and displays the rows from the Equipment Booking Table with matching equipment Id.

Link: http://localhost:8888/HarmonyHouse/api/equipmentBookings/getEquipBookingByEquipId.php?equipmentId={equipmentId}

    Variables Required:
    * Equipment Id

    Possible Responses:
    * Equipment Booking details of all the Equipment Booking with a matching equipment id with that entered.
    * Error Message - An error occured and the equipment id entered was not found.

## Get Equipment By Booking Id
Gets and displays the rows from the Equipment Booking Table with matching booking Id.

Link: http://localhost:8888/HarmonyHouse/api/equipmentBookings/getEquipBookingByBookingId.php?bookingId={bookingId}

    Variables Required:
    * Booking Id

    Possible Responses:
    * Equipment Booking details of all the Equipment Booking with a matching booking id with that entered.
    * Error Message - An error occured and the booking id entered was not found.

## Update Equipment Booking
Lets user update a row in the equipment booking table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/equipmentBookings/updateEquipBooking.php

    Variables Required:
    * Id
    * eventId
    * equipmentId
    * bookingId
    * paymentTerms

    Possible Responses:
    * Equipment Booking Updated - API worked as expected and the equipment booking with the entered id was updated in the database.
    * Equipment Booking Not Updated - An error occured and the Equipment Booking was not updated.

    Sample Input
        {
            "id":"1",
            "eventId":"1",
            "equipmentId":"2",
            "bookingId":"2",
            "paymentTerms":"4"
        }