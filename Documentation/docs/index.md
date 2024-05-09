# Harmony House
User Documentation for the API

Harmony House is an API of a Concert Hall Booking System. The API interacts with the database to create, update and edit details in the database which stores information about the events, users, equipment and all the bookings of the hall.


## Quick Overview of the API

Name explaination of the endpoints:

* If the endpoint name includes `create` - Creates a new row in the table.
* If the endpoint name includes `update` - Updates a row or a field in the table.
* If the endpoint name includes `get` - Gets the data from the database and displays it.
* If the endpoint name includes `delete` - Deletes a row from the table.

## Database Table Overview

Explaination of the the Tables, Data they contain and the fields

#### Bank
    
    Contains details of all the Banks

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row
    * name - bank name as entered by the user

#### Booking
    
    Contains details of all the bookings done through the system. This is a linking table, linking multiple tables together.

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row 
    * userId - links to the user table, used to identify the user who did the booking
    * seatId - links to the seat table, used to identify the booked seat for the booking
    * eventId - links to the event table, used to identify the event the booking refers to
    * paymentTerms - links to the paymentTerms table, used to identify the terms of payment of the booking

#### Country
    
    Contains details of all the Countries

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row
    * name - country name as entered by the user

#### Equipment
    
    Contains details of all the equipment that the Hall possesses. This equipment is available for  renting purpose by different events.

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row.
    * name - equipment name as entered by the user.
    * price - equipment renting price as entered by the user.
    * serialNo - serial no as entered by the user. Serial no is used to identify between multiples of the same equipment.

#### Equipment Booking
    
    Contains details of all the equipment bookings done through the system. This is a linking table, linking multiple tables together.

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row 
    * eventId - links to the event table, used to identify the event the equipment booking refers to
    * equipmentId - links to the equipment table, used to identify the equipment being booked
    * bookingId - links to the booking table, used to identify the booking the equipment booking refers to
    * paymentTerms - links to the paymentTerms table, used to identify the terms of payment of the booking

#### Events
    
    Contains details of all the events being held in the hall.

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row 
    * eventName - contains the name of the Event.
    * eventDate - contains the date of the Event. (Format: YYYY-MM-DD)
    * eventTime - contains the time of the Event. (Format: HH:MM:SS)
    * organiserPrice - contains the entry price as specified by the organiser (the hall price is than added to the ticket prices)
    * eventStatus - links to the status table, used to identify the status of the event
    * user - links to the user table, used to identify the user organising the event
    * paymentTerms - links to the paymentTerms table, used to identify the terms of payment of the event

#### Payment Details
    
    Contains details of all the user payment details.

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row 
    * cardNo - contains the card number as entered by the user. (Format: 0000 0000 0000 0000)
    * bankId - links to the bank table, used to identify the bank used by the user
    * expDate - contains the expiration Date of the card used by the user . (Format: MM/YY)
    * CVV - contains the card CVV as entered by the user
    * holderName - contains the card holder Name as entered by the user.

#### Payment Terms
    
    Contains all the different Payment Terms the hall offers to its users

    Example: 'Paid in full', 'To pay after event'

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row 
    * name - contains the name of the payment terms.

#### Role
    
    Contains all the roles that are available for different users. The roles refer to both the hall employees, visiting patreons and event organisers.
    
    Example: 'Audience', 'Organiser', 'Usher'

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row 
    * name - contains the name of the role.

#### Seat
    
    Contains the details of all the seats in the hall

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row 
    * seatNo - contains the number of the seat.
    * seatRow - contains the row of the seat.
    * seatSection - links to the section table, used to identify the different sections in the hall.
    * venuePrice - contains the price charged by the venue extra and above that specified by the organiser.

#### Section
    
    Contains the details of all the sections in the hall

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row 
    * name - contains the name of the section in the hall.

#### Status
    
    Contains the details of all the statues for the events held in the hall

    Example: 'Confirmed', 'Pending', 'Cancelled'

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row 
    * name - contains the name of the status.

#### Street
    
    Contains the details of all the steets entered in the system. Streets which have the same name but a different town will be two seperate rows, with seperate ids.

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row 
    * name - contains the name of the street as entered by the user.
    * townId - links to the Town Table, used to indentify in which town the street is located.

#### Town
    
    Contains the details of all the towns entered in the system

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row 
    * name - contains the name of the town as entered by the user.
    * countryId - links to the Country Table, used to indentify in which country the town is located.

#### Users
    
    Contains all the details of all the users which have an account in the system

    Fields
    * id - auto increments and is entered automatically by the system. Id is unique to each row 
    * name - contains the name of the user as entered by the user.
    * surname - contains the surname of the user as entered by the user.
    * address - contains the address (door Number only) of the user as entered by the user.
    * streetId - links to the Street Table, used to indentify in which street the user lives. By picking a street, the user is automatically choosing a town and a country because they are all linked.
    * paymentDetailsId - links to the PaymentDetails Table, used to indentify the payment details entered by the user
    * roleId - links to the Role Table, used to indentify the user role.
    * email - contains the user email as entered by the user
    * password - contains the user password for loggin in the system.
    * notifications - determines which users want to receive email notifications about upcoming events or not. (Format: 1 - receive notifications, 0 - do not receive notifications)

