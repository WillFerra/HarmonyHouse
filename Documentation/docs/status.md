# Status
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create Status
Creates a new row in the Status Table.

Link: http://localhost:8888/HarmonyHouse/api/status/createStatus.php

    Variables Required:
    * name

    Possible Responses:
    * Status Created - API worked as expected and new status was created in the database.
    * Status Not Created - An error occured and the status was not created.

    Sample Input:
        {
            "name":"Re-scheduled"
        }

## Delete Status
Deletes a row from the Status Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/status/deleteStatus.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * Status Deleted - API worked as expected and the Status with the entered id was deleted from the database.
    * Status Not Deleted - An error occured and the Status was not deleted.

## Get Statuses
Gets and displays all the Statues stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/status/getStatuses.php?

    Variables Required:
    * None

    Possible Responses:
    * Status details of all the Statuses in the database.
    * Error Message - An error occured and the statuses were not found.

## Get Status By Id
Gets and displays a row from the Status Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/status/getStatusById.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The Status details relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get Status By Name
Gets and displays rows from the Status Table according to the name entered. The Enpoint does not require a full name, it displays all rows that match what was entered. 

Example: If 'a' is entered, the API displays all the statuses that have an 'a' in their name.

Link: http://localhost:8888/HarmonyHouse/api/status/getStatusByName.php?name={name}

    Variables Required:
    * name

    Possible Responses:
    * Status details of all the statuses with a matching name with that entered.
    * Error Message - An error occured and the name entered was not found in any of the statuses names.

## Update Status
Lets user update a row in the Status table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/status/updateStatus.php

    Variables Required:
    * Id
    * name

    Possible Responses:
    * Status Updated - API worked as expected and the Status with the entered id was updated in the database.
    * Status Not Updated - An error occured and the Status was not updated.

    Sample Input
        {
            "id":"1",
            "name":"Confirmed"
        }




