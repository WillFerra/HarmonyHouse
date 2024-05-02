# Harmony House
User Documentation for the API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.


## Quick Overview of the API

Name explaination of the endpoints:

* If the endpoint name includes `create` - Create a new row in the table.
* If the endpoint name includes `update` - Updates a row or a field in the table.
* If the endpoint name includes `get` - Gets the data from the database and displays it.
* If the endpoint name includes `delete` - Deletes a row from the table.

## Bank Endpoints

##### Create Bank
Creates a new row in the Bank Table.

    Variables Required
    * Name

    Possible Responses
    * Bank Created - API worked as expected and a new bank was created in the database.
    * Bank Not Created - An error occured and the Bank was not created.

##### Delete Bank
Deletes a row in the Bank Table according to the id entered.

    Variables Required
    * Id

    Possible Responses
    * Bank Deleted - API worked as expected and the bank with the entered id was deleted from the  database.
    * Bank Not Deleted - An error occured and the Bank was not deleted.

##### Get Bank By Id
Gets and displays a row from the Bank Table according to the id entered.

    Variables Required
    * Id

    Possible Responses
    * The bank Details relating to the entered id
    * Error Message - An error occured and the id entered was not found.


