# Users
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create User
Creates a new row in the User Table.

Link: http://localhost:8888/HarmonyHouse/api/users/createUser.php

    Variables Required:
    * name
    * surname
    * address
    * streetId
    * paymentDetailsId
    * roleId
    * email
    * password
    * notifications

    Possible Responses:
    * User Created - API worked as expected and a new user was created in the database.
    * User Not Created - An error occured and the User was not created.

    Sample Input:
        {
            "name":"Will",
            "surname":"Ferrante",
            "address":"15",
            "streetId":"1",
            "paymentDetailsId":"2",
            "roleId":"1",
            "email":"willferr@gmail.com",
            "password":"1234",
            "notifications":"1"
        }

## Delete User
Deletes a row from the User Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/users/deleteUser.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * User Deleted - API worked as expected and the User with the entered id was deleted from the database.
    * User Not Deleted - An error occured and the User was not deleted.

## Get Users
Gets and displays all the Users stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/users/getUsers.php?

    Variables Required:
    * None

    Possible Responses:
    * User details of all the Users in the database.
    * Error Message - An error occured and the Users were not found.

## Get Users By Id
Gets and displays a row from the User Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/users/getUserById.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The User Details relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get User By Name
Gets and displays rows from the User Table according to the name entered. The Enpoint does not require a full name, it displays all rows that match what was entered. 

Example: If 'a' is entered, the API displays all the users that have an 'a' in their name.

Link: http://localhost:8888/HarmonyHouse/api/users/getUserByName.php?name={name}

    Variables Required:
    * name

    Possible Responses:
    * User details of all the users with a matching name with that entered.
    * Error Message - An error occured and the name entered was not found in any of the users names.

## Get User By Surname
Gets and displays rows from the User Table according to the surname entered. The Enpoint does not require a full surname, it displays all rows that match what was entered. 

Example: If 'a' is entered, the API displays all the users that have an 'a' in their surname.

Link: http://localhost:8888/HarmonyHouse/api/users/getUserBySurname.php?surname={surname}

    Variables Required:
    * surname

    Possible Responses:
    * User details of all the users with a matching surname with that entered.
    * Error Message - An error occured and the surname entered was not found in any of the users surnames.

## Get User By Role Id
Gets and displays rows from the Users Table according to the roleId entered.

Link: http://localhost:8888/HarmonyHouse/api/users/getUserByRole.php?roleId={roleId}

    Variables Required:
    * roleId

    Possible Responses:
    * User details of all the events with a matching roleId with that entered.
    * Error Message - An error occured and the roleId entered was not found.

## Get User By Email
Gets and displays rows from the User Table according to the email entered. The Enpoint does not require a full email, it displays all rows that match what was entered. 

Example: If 'a' is entered, the API displays all the users that have an 'a' in their email.

Link: http://localhost:8888/HarmonyHouse/api/users/getUsersByEmail.php?email={email}

    Variables Required:
    * email

    Possible Responses:
    * User details of all the users with a matching email with that entered.
    * Error Message - An error occured and the email entered was not found in any of the users email.

## Get User By Notifications
Gets and displays rows from the Users Table according to the notificationsId entered.

Link: http://localhost:8888/HarmonyHouse/api/users/getUsersByNotifications.php?notifications={notifications}

    Variables Required:
    * notifications

    Possible Responses:
    * User details of all the events with a matching notifications with that entered.
    * Error Message - An error occured and the notifications entered was not found.

## Update User
Lets user update a row in the User table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/events/updateEvent.php

    Variables Required:
    * id
    * name
    * surname
    * address
    * streetId
    * paymentDetailsId
    * roleId
    * email
    * password
    * notifications

    Possible Responses:
    * User Updated - API worked as expected and the user with the entered id was updated in the database.
    * User Not Updated - An error occured and the User was not updated.

    Sample Input
        {
            "id":"1",
            "name":"Britney",
            "surname":"Portelli",
            "address":"23",
            "streetId":"4",
            "paymentDetailsId":"2",
            "roleId":"2",
            "email":"britneypisa@gmail.com",
            "password":"2349dk",
            "notifications":"1"
        }

## Update User Name
Lets user update the name in a row in the User table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/users/updateUserName.php?id={id}

    Variables Required:
    * id
    * name

    Possible Responses:
    * User Name Updated - API worked as expected and the name of the user with the entered id was updated in the database.
    * User Name Not Updated - An error occured and the User Name was not updated.

    Sample Input
        {
            "name":"Shannel"
        }

## Update User Surname
Lets user update the surname in a row in the User table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/users/updateUserSurname.php?id={id}

    Variables Required:
    * id
    * surname

    Possible Responses:
    * User Surname Updated - API worked as expected and the surname of the user with the entered id was updated in the database.
    * User Surname Not Updated - An error occured and the User Surname was not updated.

    Sample Input
        {
             "surname":"Brincat"
        }

## Update User Address
Lets user update the address in a row in the User table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/users/updateUserAddress.php?id={id}

    Variables Required:
    * id
    * address

    Possible Responses:
    * User Address Updated - API worked as expected and the address of the user with the entered id was updated in the database.
    * User Address Not Updated - An error occured and the User Address was not updated.

    Sample Input
        {
            "address":"234"
        }

## Update User StreetId
Lets user update the streetId in a row in the User table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/users/updateUserStreetId.php?id={id}

    Variables Required:
    * id
    * streetId

    Possible Responses:
    * User StreetId Updated - API worked as expected and the streetId of the user with the entered id was updated in the database.
    * User StreetId Not Updated - An error occured and the User StreetId was not updated.

    Sample Input
        {
            "streetId":"4"
        }

## Update User Role
Lets user update the role in a row in the User table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/users/updateUserRole.php?id={id}

    Variables Required:
    * id
    * roleId

    Possible Responses:
    * User RoleId Updated - API worked as expected and the roleId of the user with the entered id was updated in the database.
    * User RoleId Not Updated - An error occured and the User RoleId was not updated.

    Sample Input
        {
            "roleId":"1"
        }

## Update User Payment Details Id
Lets user update the paymentDetailsId in a row in the User table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/users/updateUserPaymentDetailsId.php?id={id}

    Variables Required:
    * id
    * paymentDetailsId

    Possible Responses:
    * User paymentDetailsId Updated - API worked as expected and the paymentDetailsId of the user with the entered id was updated in the database.
    * User paymentDetailsId Not Updated - An error occured and the User paymentDetailsId was not updated.

    Sample Input
        {
            "paymentDetailsId":"2"
        }

## Update User Email
Lets user update the email in a row in the User table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/users/updateUserEmail.php?id={id}

    Variables Required:
    * id
    * email

    Possible Responses:
    * User email Updated - API worked as expected and the email of the user with the entered id was updated in the database.
    * User email Not Updated - An error occured and the User email was not updated.

    Sample Input
        {
            "email":"willferr@gmail.com"
        }

## Update User Password
Lets user update the password in a row in the User table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/users/updateUserPassword.php?id={id}

    Variables Required:
    * id
    * password

    Possible Responses:
    * User password Updated - API worked as expected and the password of the user with the entered id was updated in the database.
    * User Password Not Updated - An error occured and the User password was not updated.

    Sample Input
        {
            "password":"dfeo02"
        }

## Update User Notifications
Lets user update the notifications in a row in the User table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/users/updateUserNotifications.php?id={id}

    Variables Required:
    * id
    * notifications

    Possible Responses:
    * User notifications Updated - API worked as expected and the notifications of the user with the entered id was updated in the database.
    * User Notifications Not Updated - An error occured and the User notifications was not updated.

    Sample Input
        {
            "notifications":"1"
        }

