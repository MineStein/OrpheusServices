<?php
$pageTitle = 'Control Panel';
include('../assets/includes/backend/include.php');
$user->logout(); 
header ('Location: login');
exit;
?>