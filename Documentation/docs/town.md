# Town
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create Town
Creates a new row in the Town Table.

Link: http://localhost:8888/HarmonyHouse/api/town/createTown.php?

    Variables Required:
    * name
    * countryId

    Possible Responses:
    * Town Created - API worked as expected and a new town was created in the database.
    * Town Not Created - An error occured and the Town was not created.

    Sample Input:
        {
            "name":"Amsterdam",
            "countryId":"6"
        }

## Delete Town
Deletes a row from the Town Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/town/deleteTown.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * Town Deleted - API worked as expected and the Town with the entered id was deleted from the database.
    * Town Not Deleted - An error occured and the Town was not deleted.

## Get Towns
Gets and displays all the Towns stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/town/getTowns.php

    Variables Required:
    * None

    Possible Responses:
    * Town details of all the Town in the database.
    * Error Message - An error occured and the Towns were not found.

## Get Town By Id
Gets and displays a row from the Town Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/town/getTownById.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The Town Details relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get Town By Name
Gets and displays rows from the Town Table according to the name entered. The Enpoint does not require a full name, it displays all rows that match what was entered. 

Example: If 'a' is entered, the API displays all the town their name.

Link: http://localhost:8888/HarmonyHouse/api/town/getTownByName.php?name={name}

    Variables Required:
    * name

    Possible Responses:
    * Town details of all the towns with a matching name with that entered.
    * Error Message - An error occured and the name entered was not found in any of the town names.

## Get Town By Country Id
Gets and displays rows from the Town Table according to the country Id entered.

Link: http://localhost:8888/HarmonyHouse/api/town/getTownByCountryId.php?countryId={countryId}

    Variables Required:
    * countryId

    Possible Responses:
    * Town details of all the towns with a matching countryId with that entered.
    * Error Message - An error occured and the countryId entered was not found.

## Update Town
Lets user update a row in the Town table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/town/updateTown.php?id=1

    Variables Required:
    * id
    * name
    * countryId

    Possible Responses:
    * Town Updated - API worked as expected and the town with the entered id was updated in the database.
    * Town Not Updated - An error occured and the Town was not updated.

    Sample Input
        {
            "id":"1",
            "name":"Hamrun",
            "countryId":"1"
        }

## Update Town Name
Lets user update the townName in a row in the Town table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/town/updateTownName.php?id={id}

    Variables Required:
    * id
    * name

    Possible Responses:
    * Town Name Updated - API worked as expected and the name of the town with the entered id was updated in the database.
    * Town Name Not Updated - An error occured and the Town Name was not updated.

    Sample Input
        {
            "name":"Hamrun"
        }

## Update Town Country Id
Lets user update the countryId in a row in the Town table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/town/updateTownCountryId.php?id={id}

    Variables Required:
    * id
    * countryId

    Possible Responses:
    * Town CountryId Updated - API worked as expected and the countryId of the town with the entered id was updated in the database.
    * Town CountryId Not Updated - An error occured and the Town CountryId was not updated.

    Sample Input
        {
            "countryId":"6"
        }