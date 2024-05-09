# Role
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create Role
Creates a new row in the Role Table.

Link: http://localhost:8888/HarmonyHouse/api/role/createRole.php

    Variables Required:
    * name

    Possible Responses:
    * Role Created - API worked as expected and new role was created in the database.
    * Role Not Created - An error occured and the role was not created.

    Sample Input:
        {
            "name":"Cleaner"
        }

## Delete Role
Deletes a row from the Role Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/role/deleteRole.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * Role Deleted - API worked as expected and the Role with the entered id was deleted from the database.
    * Role Not Deleted - An error occured and the Role was not deleted.

## Get Roles
Gets and displays all the Role stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/role/getRoles.php

    Variables Required:
    * None

    Possible Responses:
    * Role details of all the roles in the database.
    * Error Message - An error occured and the roles were not found.

## Get Role By Id
Gets and displays a row from the Role Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/role/getRoleById.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The Role details relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get Role By Name
Gets and displays rows from the Role Table according to the name entered. The Enpoint does not require a full name, it displays all rows that match what was entered. 

Example: If 'a' is entered, the API displays all the roles that have an 'a' in their name.

Link: http://localhost:8888/HarmonyHouse/api/role/getRoleByName.php?name={name}

    Variables Required:
    * name

    Possible Responses:
    * Role details of all the roles with a matching name with that entered.
    * Error Message - An error occured and the name entered was not found in any of the role names.

## Update Role
Lets user update a row in the Role table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/role/updateRole.php

    Variables Required:
    * Id
    * name

    Possible Responses:
    * Role Updated - API worked as expected and the Role with the entered id were updated in the database.
    * Role Not Updated - An error occured and the Role were not updated.

    Sample Input
        {
            "id":"5",
            "name":"Secretary"
        }




