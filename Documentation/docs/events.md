# Events
User Documentation for Harmony House API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.

## Create Event
Creates a new row in the Event Table.

Link: http://localhost:8888/HarmonyHouse/api/events/createEvent.php

    Variables Required:
    * eventName
    * eventDate
    * eventTime
    * organiserPrice
    * eventStatus
    * user
    * paymentTerms

    Possible Responses:
    * Event Created - API worked as expected and a new event was created in the database.
    * Event Not Created - An error occured and the Event was not created.

    Sample Input:
        {
            "eventName":"Festa24",
            "eventDate":"2024-08-11",
            "eventTime":"19:00:00",
            "organiserPrice":"15.00",
            "eventStatus":"1",
            "user":"2",
            "paymentTerms":"4"
        }

## Get Events
Gets and displays all the Events stored in the database. 

Link: http://localhost:8888/HarmonyHouse/api/events/getEvents.php?

    Variables Required:
    * None

    Possible Responses:
    * Event details of all the Events in the database.
    * Error Message - An error occured and the events were not found.

## Get Event By Id
Gets and displays a row from the Event Table according to the id entered.

Link: http://localhost:8888/HarmonyHouse/api/events/getEventById.php?id={id}

    Variables Required:
    * Id

    Possible Responses:
    * The Event Details relating to the entered id
    * Error Message - An error occured and the id entered was not found.

## Get Event By Name
Gets and displays rows from the Event Table according to the name entered. The Enpoint does not require a full name, it displays all rows that match what was entered. 

Example: If 'a' is entered, the API displays all the events that have an 'a' in their name.

Link: http://localhost:8888/HarmonyHouse/api/events/getEventByName.php?eventName={name}

    Variables Required:
    * eventName

    Possible Responses:
    * Event details of all the events with a matching name with that entered.
    * Error Message - An error occured and the name entered was not found in any of the event names.

## Get Event By Date
Gets and displays rows from the Event Table according to the date entered. The Enpoint does not require a full date, it displays all rows that match what was entered. 

Example: If '04' is entered, the API displays all the events that have '04' in their date (day/ month/ or year).

Link: http://localhost:8888/HarmonyHouse/api/events/getEventByDate.php?eventDate={date}

    Variables Required:
    * eventDate

    Possible Responses:
    * Event details of all the events with a matching date with that entered.
    * Error Message - An error occured and the date entered was not found in any of the event names.

## Get Event By User Id
Gets and displays rows from the Event Table according to the user Id entered.

Link: http://localhost:8888/HarmonyHouse/api/events/getEventByUser.php?user={userId}

    Variables Required:
    * user

    Possible Responses:
    * Event details of all the events with a matching userId with that entered.
    * Error Message - An error occured and the userId entered was not found.

## Get Event By Status
Gets and displays rows from the Event Table according to the statusId entered.

Link: http://localhost:8888/HarmonyHouse/api/events/getEventByStatus.php?eventStatus={eventStatus}

    Variables Required:
    * eventStatus

    Possible Responses:
    * Event details of all the events with a matching eventStatus with that entered.
    * Error Message - An error occured and the eventStatus entered was not found.

## Update Event
Lets user update a row in the Event table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/events/updateEvent.php

    Variables Required:
    * id
    * eventName
    * eventDate
    * eventTime
    * organiserPrice
    * eventStatus
    * user
    * paymentTerms

    Possible Responses:
    * Event Updated - API worked as expected and the event with the entered id was updated in the database.
    * Event Not Updated - An error occured and the Event was not updated.

    Sample Input
        {
            "id":"1",
            "eventName":"St. Joseph",
            "eventDate":"2024-03-19",
            "eventTime":"19:00:00",
            "organiserPrice":"10",
            "eventStatus":"1",
            "user":"2",
            "paymentTerms":"4"
        }

## Update Event Name
Lets user update the eventName in a row in the Event table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/events/updateEventName.php?id={id}

    Variables Required:
    * id
    * eventName

    Possible Responses:
    * Event Name Updated - API worked as expected and the eventName with the entered id was updated in the database.
    * Event Name Not Updated - An error occured and the Event Name was not updated.

    Sample Input
        {
            "eventName":"St. Joseph"
        }

## Update Event Date
Lets user update the eventDate in a row in the Event table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/events/updateEventDate.php?id={id}

    Variables Required:
    * id
    * eventDate

    Possible Responses:
    * Event Date Updated - API worked as expected and the eventDate with the entered id was updated in the database.
    * Event Date Not Updated - An error occured and the Event Date was not updated.

    Sample Input
        {
            "eventDate":"2024-08-18"
        }

## Update Event Time
Lets user update the eventTime in a row in the Event table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/events/updateEventTime.php?id={id}

    Variables Required:
    * id
    * eventTime

    Possible Responses:
    * Event Time Updated - API worked as expected and the eventTime with the entered id was updated in the database.
    * Event Time Not Updated - An error occured and the Event Time was not updated.

    Sample Input
        {
            "eventTime":"19:30"
        }

## Update Event Status
Lets user update the eventStatus in a row in the Event table according to the id entered

N.B.: This function can be used as a delete of the event by changing the eventStatus to 'Cancelled'

Link: http://localhost:8888/HarmonyHouse/api/events/updateEventStatus.php?id={id}

    Variables Required:
    * id
    * eventStatus

    Possible Responses:
    * Event Status Updated - API worked as expected and the eventStatus with the entered id was updated in the database.
    * Event Status Not Updated - An error occured and the Event Status was not updated.

    Sample Input
        {
            "eventStatus":"1"
        }

## Update Event Organiser Price
Lets user update the organiserPrice in a row in the Event table according to the id entered

Link: http://localhost:8888/HarmonyHouse/api/events/updateEventOrganiserPrice.php?id={id}

    Variables Required:
    * id
    * organiserPrice

    Possible Responses:
    * Event Organiser Price Updated - API worked as expected and the organiserPrice with the entered id was updated in the database.
    * Event Organiser Price Not Updated - An error occured and the Event Status was not updated.

    Sample Input
        {
            "organiserPrice":"11.50"
        }

