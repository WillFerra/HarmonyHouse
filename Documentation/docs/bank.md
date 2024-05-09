# Bank
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create Bank
Creates a new row in the Bank Table.

Link: http://localhost:8888/HarmonyHouse/api/bank/createBank.php

    Variables Required:
    * Name

    Possible Responses:
    * Bank Created - API worked as expected and a new bank was created in the database.
    * Bank Not Created - An error occured and the Bank was not created.

    Sample Input:
        {
            "name":"FCM Bank"
        }

## Delete Bank
Deletes a row from the Bank Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/bank/deleteBank.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * Bank Deleted - API worked as expected and the bank with the entered id was deleted from the  database.
    * Bank Not Deleted - An error occured and the Bank was not deleted.

## Get Banks
Gets and displays all the Banks stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/bank/getBanks.php?

    Variables Required:
    * None

    Possible Responses:
    * Bank details of all the banks in the database.
    * Error Message - An error occured and the id entered was not found.

## Get Bank By Id
Gets and displays a row from the Bank Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/bank/getBankById.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The bank Details relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get Bank By Name
Gets and displays a row from the Bank Table according to the name entered. The Enpoint does not require a full name, It displays all rows that match what was entered. 

Example: If 'a' is entered, the API displays all the banks that have an 'a' in their name.

Link: http://localhost:8888/HarmonyHouse/api/bank/getBankByName.php?name={name}

    Variables Required:
    * Name

    Possible Responses:
    * Bank details of all the banks with a matching name with that entered.
    * Error Message - An error occured and the name entered was not found.

## Update Bank
Lets user update a row in the bank table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/bank/updateBank.php?

    Variables Required:
    * Id
    * Name

    Possible Responses:
    * Bank Updated - API worked as expected and the bank with the entered id was updated in the database.
    * Bank Not Updated - An error occured and the Bank was not updated.

    Sample Input:
        {
            "id":"1",
            "name":"HSBC"
        }


