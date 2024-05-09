# Country
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create Country
Creates a new row in the Country Table.

Link: http://localhost:8888/HarmonyHouse/api/country/createCountry.php

    Variables Required:
    * name

    Possible Responses:
    * Country Created - API worked as expected and a new country was created in the database.
    * Country Not Created - An error occured and the Country was not created.

    Sample Input:
        {
            "name":"Netherlands"
        }

## Delete Country
Deletes a row from the Country Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/country/deleteCountry.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * Country Deleted - API worked as expected and the country with the entered id was deleted from the database.
    * Country Not Deleted - An error occured and the Country was not deleted.

## Get Countries
Gets and displays all the Countries stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/country/getCountries.php

    Variables Required:
    * None

    Possible Responses:
    * Country details of all the countries in the database.
    * Error Message - An error occured and the user id entered was not found.
    
## Get Country By Id
Gets and displays a row from the Country Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/country/getCountryById.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The Country Details relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get Country By Name
Gets and displays a row from the Country Table according to the name entered. The Enpoint does not require a full name, It displays all rows that match what was entered. 

Example: If 'a' is entered, the API displays all the Country that have an 'a' in their name.

Link: http://localhost:8888/HarmonyHouse/api/country/getCountryByName.php?name={name}

    Variables Required:
    * Name

    Possible Responses:
    * Country details of all the Country with a matching name with that entered.
    * Error Message - An error occured and the id entered was not found.

## Update Country
Lets user update a row in the countries table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/country/updateCountry.php

    Variables Required:
    * Id
    * name

    Possible Responses:
    * Country Updated - API worked as expected and the country with the entered id was updated in the database.
    * Country Not Updated - An error occured and the Country was not updated.

    Sample Input
        {
            "id":"7",
            "name":"Romania"
        }


