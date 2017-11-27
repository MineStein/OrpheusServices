<?php
// Start
ob_start();
session_start();

// Basic information
define('DIR','https://www.orpheus.services/controlpanel');
define('SITEEMAIL','support@orpheus.services');
date_default_timezone_set('America/New_York');

// MySQL information 
$host = 'localhost';
$user = 'orpheuss_admin'; 
$pass = '2tEs8cYhA0QX';
$db = 'orpheuss_website';

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);
if (!$conn) {
    die(mysqli_connect_error());
}

if ($pageTitle == 'Control Panel') {
	define('ROOT_PATH', dirname(__DIR__).'/');
	define('APP_ROOT', realpath(dirname(FILE)).'/');
	include(APP_ROOT.'classes/user.php');

	// Create instances
	$user = new User($conn);
}