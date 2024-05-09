# Section
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create Section
Creates a new row in the Section Table.

Link: http://localhost:8888/HarmonyHouse/api/section/createSection.php

    Variables Required:
    * name

    Possible Responses:
    * Section Created - API worked as expected and new section was created in the database.
    * Section Not Created - An error occured and the section was not created.

    Sample Input:
        {
            "name":"D"
        }

## Delete Section
Deletes a row from the Section Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/section/deleteSection.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * Section Deleted - API worked as expected and the section with the entered id were deleted from the database.
    * Section Not Deleted - An error occured and the Section were not deleted.

## Get Section
Gets and displays all the Sections stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/section/getSections.php

    Variables Required:
    * None

    Possible Responses:
    * Section details of all the sections in the database.
    * Error Message - An error occured and the section were not found.

## Get Section By Id
Gets and displays a row from the Section Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/section/getSectionById.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The Section details relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get Section By Name
Gets and displays rows from the Section Table according to the name entered. The Enpoint does not require a full name, it displays all rows that match what was entered. 

Example: If 'a' is entered, the API displays all the sections that have an 'a' in their name.

Link: http://localhost:8888/HarmonyHouse/api/section/getSectionByName.php?name={name}

    Variables Required:
    * name

    Possible Responses:
    * Section details of all the roles with a matching name with that entered.
    * Error Message - An error occured and the name entered was not found in any of the section names.

## Update Section
Lets user update a row in the Section table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/section/updateSection.php

    Variables Required:
    * Id
    * name

    Possible Responses:
    * Section Updated - API worked as expected and the Section with the entered id were updated in the database.
    * Section Not Updated - An error occured and the Section were not updated.

    Sample Input
        {
            "id":"4",
            "name":"E"
        }




