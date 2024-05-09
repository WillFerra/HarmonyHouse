# Seat
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create Seat
Creates a new row in the Seat Table.

Link: http://localhost:8888/HarmonyHouse/api/seat/createSeat.php

    Variables Required:
    * seatNo
    * seatRow
    * seatSection
    * venuePrice

    Possible Responses:
    * Seat Created - API worked as expected and new seat was created in the database.
    * Seat Not Created - An error occured and the seat was not created.

    Sample Input:
        {
            "seatNo":"3",
            "seatRow":"1",
            "seatSection":"1",
            "venuePrice":"25"
        }

## Delete Seat
Deletes a row from the Seat Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/seat/deleteSeat.php?id=5{id}

    Variables Required:
    * Id

    Possible Responses:
    * Seat Deleted - API worked as expected and the Seat with the entered id was deleted from the database.
    * Seat Not Deleted - An error occured and the Seat was not deleted.

## Get Seats
Gets and displays all the Seats stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/seat/getSeats.php

    Variables Required:
    * None

    Possible Responses:
    * Seat details of all the seats in the database.
    * Error Message - An error occured and the seats were not found.

## Get Seat By Id
Gets and displays a row from the Seat Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/seat/getSeatById.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The Seat details relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get Seat By Seat No
Gets and displays a row from the Seat Table according to the seat number entered.

Link: http://localhost:8888/HarmonyHouse/api/seat/getSeatByNo.php?seatNo={seatNo}

    Variables Required:
    * seatNo

    Possible Responses:
    * The Seat details relating to the entered seat number
    * Error Message - An error occured and the seat number entered was not found.

## Get Seat By Row
Gets and displays rows from the Seat Table according to the seat Row entered.

Link: http://localhost:8888/HarmonyHouse/api/seat/getSeatByRow.php?seatRow={seatRow}

    Variables Required:
    * seatRow

    Possible Responses:
    * The Seat details relating to all the seats with the entered Row Number.
    * No Seats Found - the entered row number has no seats linked to it.

## Get Seat By Section
Gets and displays rows from the Seat Table according to the section entered.

Link: http://localhost:8888/HarmonyHouse/api/seat/getSeatBySection.php?seatSection={seatSection}

    Variables Required:
    * seatSection

    Possible Responses:
    * The Seat details relating to all the seats with the entered Section.
    * No Seats Found - the entered section has no seats linked to it.

## Update Seat
Lets user update a row in the Seat table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/seat/updateSeat.php

    Variables Required:
    * Id
    * seatNo
    * seatRow
    * seatSection
    * venuePrice

    Possible Responses:
    * Seat Updated - API worked as expected and the Seat with the entered id was updated in the database.
    * Seat Not Updated - An error occured and the Seat was not updated.

    Sample Input
        {
            "id":"4",
            "seatNo":"16",
            "seatRow":"44",
            "seatSection":"3",
            "venuePrice":"15"
        }

## Update Seat No
Lets user update the SeatNo in a row in the Seat table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/seat/updateSeatNo.php?id={id}

    Variables Required:
    * seatNo

    Possible Responses:
    * Seat No Updated - API worked as expected and the seatNo of the seat with the entered id was updated in the database.
    * Seat No Not Updated - An error occured and the Seat No was not updated.

    Sample Input
        {
            "seatNo":"1"
        }

## Update Seat Row
Lets user update the SeatRow in a row in the Seat table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/seat/updateSeatRow.php?id={id}

    Variables Required:
    * seatRow

    Possible Responses:
    * Seat Row Updated - API worked as expected and the seatRow of the seat with the entered id was updated in the database.
    * Seat Row Not Updated - An error occured and the Seat Row was not updated.

    Sample Input
        {
            "seatRow":"1"
        }

## Update Seat Section
Lets user update the Seat Section in a row in the Seat table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/seat/updateSeatSection.php?id={id}

    Variables Required:
    * seatSeaction

    Possible Responses:
    * Seat Section Updated - API worked as expected and the seatSection of the seat with the entered id was updated in the database.
    * Seat Seaction Not Updated - An error occured and the Seat Section was not updated.

    Sample Input
        {
            "seatSection":"1"
        }

## Update Seat Venue Price
Lets user update the Seat Venue Price in a row in the Seat table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/seat/updateSeatVenuePrice.php?id={id}

    Variables Required:
    * seatVenuePrice

    Possible Responses:
    * Seat Venue Price Updated - API worked as expected and the seat Venue Price of the seat with the entered id was updated in the database.
    * Seat Venue Price Not Updated - An error occured and the Seat Venue Price was not updated.

    Sample Input
        {
            "venuePrice":"25"
        }



