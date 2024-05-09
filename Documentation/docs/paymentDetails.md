# Payment Details
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create Payment Details
Creates a new row in the PaymentDetails Table.

Link: http://localhost:8888/HarmonyHouse/api/paymentDetails/createPaymentDetails.php

    Variables Required:
    * Card No
    * Bank Id
    * Expiration Date
    * CVV
    * Holder Name

    Possible Responses:
    * Payment Details Created - API worked as expected and new payment details were created in the database.
    * Payment Details Not Created - An error occured and the payment details were not created.

    Sample Input:
        {
            "cardNo":"9876 5432 1987 6543",
            "bankId":"1",
            "expDate":"02/25",
            "cvv":"628",
            "holderName":"Logan Borg"
        }

## Delete Payment Details
Deletes a row from the Payment Details Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/paymentDetails/deletePaymentDetails.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * Payment Details Deleted - API worked as expected and the payment Details with the entered id were deleted from the database.
    * Payment Details Not Deleted - An error occured and the Payment Details were not deleted.

## Get Payment Detials
Gets and displays all the Payment Details stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/paymentDetails/getPaymentDetails.php

    Variables Required:
    * None

    Possible Responses:
    * Payment Details details of all the Payment Details in the database.
    * Error Message - An error occured and the payment Details were not found.

## Get Payment Details By Id
Gets and displays a row from the Payment Details Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/paymentDetails/getPaymentDetailsById.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The Payment Details relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get Payment Details By Holder Name
Gets and displays rows from the Payment Details Table according to the holderName entered. The Enpoint does not require a full holderName, it displays all rows that match what was entered. 

Example: If 'a' is entered, the API displays all the payment Details that have an 'a' in their holderName.

Link: http://localhost:8888/HarmonyHouse/api/paymentDetails/getPaymentDetailsByHolderName.php?holderName={holderName}

    Variables Required:
    * holderName

    Possible Responses:
    * Payment Details of all the payment Details with a matching holderName with that entered.
    * Error Message - An error occured and the holderName entered was not found in any of the payment Details.

## Update Payment Details
Lets user update a row in the paymentDetails table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/paymentDetails/updatePaymentDetails.php

    Variables Required:
    * Id
    * cardNo
    * bankId
    * expDate
    * cvv
    * holderName

    Possible Responses:
    * Booking Updated - API worked as expected and the booking with the entered id was updated in the database.
    * Booking Not Updated - An error occured and the Payment Details was not updated.

    Sample Input
        {
            "id":"1",
            "cardNo":"5678 5678 1234 1234",
            "bankId":"2",
            "expDate":"03/27",
            "cvv":"678",
            "holderName":"Thomas Bajada"
        }




