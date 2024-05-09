# Equipment
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create Equipment
Creates a new row in the Equipment Table.

Link: http://localhost:8888/HarmonyHouse/api/equipment/createEquipment.php

    Variables Required:
    * Name
    * Price
    * Serial No.

    Possible Responses:
    * Equipment Created - API worked as expected and a new equipment was created in the database.
    * Equipment Not Created - An error occured and the Equipment was not created.

    Sample Input:
        {
            "name":"Saramonic Blink Mic",
            "price":"20",
            "serialNo":"SR2305108"
        }

## Delete Equipment
Deletes a row from the Equipment Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/equipment/deleteEquipment.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * Equipment Deleted - API worked as expected and the equipment with the entered id was deleted from the database.
    * Equipment Not Deleted - An error occured and the Equipment was not deleted.

## Get Equipment
Gets and displays all the Equipment stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/equipment/getEquipment.php

    Variables Required:
    * None

    Possible Responses:
    * Equipment details of all the equipment in the database.
    * Error Message - An error occured and the user id entered was not found.

## Get Equipment By Id
Gets and displays a row from the Equipment Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/equipment/getEquipmentById.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The Equipment Details relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get Equipment By Name
Gets and displays a row from the Equipment Table according to the name entered. The Enpoint does not require a full name, it displays all rows that match what was entered. 

Example: If 'a' is entered, the API displays all the Equipment that have an 'a' in their name.

Link: http://localhost:8888/HarmonyHouse/api/equipment/getEquipmentByName.php?name={name}

    Variables Required:
    * Name

    Possible Responses:
    * Equipment details of all the Equipment with a matching name with that entered.
    * Error Message - An error occured and the id entered was not found.

## Get Equipment By Serial No
Gets and displays a row from the Equipment Table according to the serial No entered. The Enpoint does not require a full serial No, it displays all rows that match what was entered. 

Example: If '123' is entered, the API displays all the Equipment that have '123' in their serial No.

Link: http://localhost:8888/HarmonyHouse/api/equipment/getEquipmentBySerialNo.php?serialNo=1{serialNo}

    Variables Required:
    * Serial No

    Possible Responses:
    * Equipment details of all the Equipment with a matching name with that entered.
    * Error Message - An error occured and the id entered was not found.

## Update Equipment
Lets user update a row in the equipment table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/equipment/updateEquipment.php

    Variables Required:
    * Id
    * name
    * price
    * serialNo

    Possible Responses:
    * Equipment Updated - API worked as expected and the equipment with the entered id was updated in the database.
    * Equipment Not Updated - An error occured and the Equipment was not updated.

    Sample Input
        {
            "id":"1",
            "name":"Zoom F2 Lapel Mic",
            "price":"12",
            "serialNo":"123DW360"
        }

## Update Equipment Name
Lets user update the name of a row in the equipment table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/equipment/updateEquipmentName.php

    Variables Required:
    * Id
    * name

    Possible Responses:
    * Equipment Updated - API worked as expected and the equipment name with the entered id was updated in the database.
    * Equipment Not Updated - An error occured and the Equipment Name was not updated.

    Sample Input
        {
            "id":"1",
            "name":"Zoom F2 Lapel Mic"
        }

## Update Equipment Price
Lets user update the price of a row in the equipment table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/equipment/updateEquipmentPrice.php

    Variables Required:
    * Id
    * price

    Possible Responses:
    * Equipment Updated - API worked as expected and the equipment price with the entered id was updated in the database.
    * Equipment Not Updated - An error occured and the Equipment Price was not updated.

    Sample Input
        {
            "id":"1",
            "price":"10"
        }

## Update Equipment Serial No.
Lets user update the serial No. of a row in the equipment table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/equipment/updateEquipmentSerialNo.php

    Variables Required:
    * Id
    * Serial No.

    Possible Responses:
    * Equipment Updated - API worked as expected and the equipment serial No with the entered id was updated in the database.
    * Equipment Not Updated - An error occured and the Equipment Serial No. was not updated.

    Sample Input
        {
            "id":"1",
            "serialNo":"123DW330"
        }
