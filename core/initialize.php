<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'Applications'.DS.'mamp'.DS.'htdocs'.DS.'HarmonyHouse');

defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

// connect database tables
require_once(INC_PATH.DS.'config.php');
require_once(CORE_PATH.DS.'events.php');
require_once(CORE_PATH.DS.'users.php');
require_once(CORE_PATH.DS.'equipment.php');
require_once(CORE_PATH.DS.'section.php');
require_once(CORE_PATH.DS.'paymentDetails.php');
require_once(CORE_PATH.DS.'seat.php');
require_once(CORE_PATH.DS.'paymentTerms.php');
require_once(CORE_PATH.DS.'booking.php');
require_once(CORE_PATH.DS.'status.php');
require_once(CORE_PATH.DS.'equipmentBooking.php');
require_once(CORE_PATH.DS.'bank.php');
require_once(CORE_PATH.DS.'street.php');
require_once(CORE_PATH.DS.'town.php');
require_once(CORE_PATH.DS.'country.php');
require_once(CORE_PATH.DS.'role.php');

// Add for each class
// require_once(CORE_PATH.DS.'name.php');
