<?php

$db_user = 'root';
$db_password = '1234';
$db_name = 'HarmonyHouse';

$dbharset=utf8', $db_user, $db_password);

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

define('APP NAME', 'Harmony House');