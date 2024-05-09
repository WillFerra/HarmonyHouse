# Payment Terms
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create Payment Terms
Creates a new row in the Payment Terms Table.

Link: http://localhost:8888/HarmonyHouse/api/paymentTerms/createPaymentTerms.php

    Variables Required:
    * name

    Possible Responses:
    * Payment Terms Created - API worked as expected and new payment terms were created in the database.
    * Payment Terms Not Created - An error occured and the payment terms were not created.

    Sample Input:
        {
            "name":"Paid Deposit"
        }

## Delete Payment Terms
Deletes a row from the Payment Terms Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/paymentTerms/deletePaymentTerms.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * Payment Terms Deleted - API worked as expected and the payment terms with the entered id were deleted from the database.
    * Payment Terms Not Deleted - An error occured and the Payment Terms were not deleted.

## Get Payment Terms
Gets and displays all the Payment Terms stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/paymentTerms/getPaymentTerms.php

    Variables Required:
    * None

    Possible Responses:
    * Payment Terms details of all the Payment Terms in the database.
    * Error Message - An error occured and the payment Terms were not found.

## Get Payment Terms By Id
Gets and displays a row from the Payment Terms Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/paymentTerms/getPaymentTermsById.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The Payment Terms relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get Payment Terms By Name
Gets and displays rows from the Payment Terms Table according to the name entered. The Enpoint does not require a full name, it displays all rows that match what was entered. 

Example: If 'a' is entered, the API displays all the payment terms that have an 'a' in their name.

Link: http://localhost:8888/HarmonyHouse/api/paymentTerms/getPaymentTermsByName.php?name={name}

    Variables Required:
    * name

    Possible Responses:
    * Payment Term details of all the payment Terms with a matching name with that entered.
    * Error Message - An error occured and the payment Terms entered was not found in any of the payment Terms names.

## Update Payment Terms
Lets user update a row in the payment Terms table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/paymentTerms/updatePaymentTerms.php

    Variables Required:
    * Id
    * name

    Possible Responses:
    * Payment Terms Updated - API worked as expected and the payment Terms with the entered id were updated in the database.
    * Payment Terms Not Updated - An error occured and the Payment Terms were not updated.

    Sample Input
        {
            "id":"6",
            "name":"Paid Deposit"
        }




