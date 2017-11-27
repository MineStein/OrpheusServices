<?php
$pageTitle = 'Control Panel';
include('../assets/includes/backend/include.php');

if ($user->is_logged_in()) {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    	$id = $_GET['id'];
    	if ($stmt = $conn->prepare("DELETE FROM portfolio WHERE id = ? LIMIT 1")) {
    		$stmt->bind_param("i", $id);
    		$stmt->execute();
    		$stmt->close();
    	}
    	else {
    		echo "ERROR: could not prepare SQL statement.";
    	}
    	$conn->close();
    	header ("Location: index");
    }
    else {
    	header ("Location: index");
    }
}
else {
    header ('Location: login');
}
?>