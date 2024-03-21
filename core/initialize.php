<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'Applications'.DS.'mamp'.DS.'htdocs'.DS.'APISystems'.DS.'HarmonyHouse');

defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

// connect database tables
require_once(INC_PATH.DS.'config.php');
require_once(CORE_PATH.DS.'events.php')
require_once(CORE_PATH.DS.'users.php')
require_once(CORE_PATH.DS.'equipment.php')

// Add for each class
// require_once(CORE_PATH.DS.'name.php');
