**Harmony House API for developpers**

**Folder Explaination**
    - API Folder - contains all the Endpoints sorted into different folders according to database tables
    - Core Folder - contains all the classes and the initialize file
    - Documentation Foler - contains the MkDocs for the user
    - Includes folder - contains the config file
    - Postman Exports Folder - contains all the postman endpoints exports
    - SQL Folder - contains the database export

**Database Tables**
    - Bank Table: contains the bank names
    - Booking Table: junction table with every booking detail
    - Country Table: contains all the country names
    - Equipment Table: contains all the equipment available for rent by organisers
    - EquipmentBooking Table: junction table with every equipmentBooking for each event
    - Events Table: contains all event details of the events happening at the hall
    - PaymentDetails Table: contains all the user payment details
    - PaymentTerms Table: contains the different payment terms offered by the hall
    - Role Table: contains the different roles of the users
    - Seat Table: contains the seat information
    - Section Table: contains the sections of the hall
    - Status Table: contains the status names for the events
    - Street Table: contains the steet names (every steet is linked to one town)
    - Town Table: contains the town names (every town is linked to one country)
    - Users Table: contains the user details of all users of the hall

**File Explaination**

**Config File**
Path: includes > config.php
Purpose: establishing the database connection. Specifying the username and password for MySQL database and specifying the database name (in this case HarmonyHouse).

**Initialize File**
Path: core > initialize.php
Purpose: this file is defining the roots to where the files are located on the pc and connecting the class files. The file is etting up the environment for the PHP application by defining directory constants and including necessary files to ensure that the application has access to its core functionalities and configurations.

**Class Files (applicable for all the class files)**
Path: core > ...
Purpose: These files include all the functions required by each class to interact with the database. Each function is named accordingly to what it does and they all have one corresponding endpoint which usee the function. Each file contains the respective variables needed by that specific class and a constructor method which establishes the database connection to the respective database table.

        Example:
        Path: core > bank.php
            In the Bank class, there are many different functions, all doing something different and called from different endpoints.

            Example:
            readBanks() - The first function in the bank class called readBanks is called from the getBanks.php endpoint and is instructing the database to return all the available details of all the banks in the database

            Each function create a $query with the SQL for the database interaction specified to that particular function. The function prepares and executes the $stmt and returns the result back to the endpoint.

**Endpoint Files (applicable for all the endpoints)**
Path: api > ... > ...
N.B. In the API Folder, you will find various other folders named after each database table. These folders contain all the respective endpoints relating to that particular table.

    Example:
    Path: api > bank > ... (all the endpoints relating/ interacting with the bank table)

    Each endpoint created sets the endpoint headers. Next the API is initialized and an instance is created. This is followed by the code of the API to manipulate the database data accordingly depending on the API function.

    Each endpoint is named according to its purpose. Clear names where use to make navigation and understanding the API function immediately at first glance.

        Example:
        Path: api > bank > createBank.php
        This endpoint as stated by the name create a new row in the bank table with the bank name detials.
