<?php
session_start();

$response = array("loggedIn" => false);
if (isset($_SESSION['user_id'])) {
    $response["loggedIn"] = true;
    $response["property_id"] = $_GET['property_id']; // Property ID should be passed in URL if needed
}

header('Content-Type: application/json');
echo json_encode($response);
?>


