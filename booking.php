<?php
session_start();
include("config.php");

if (!isset($_SESSION['uid'])) {
    // Redirect if the user is not logged in
    $_SESSION['redirect_to_booking'] = true;
    $_SESSION['property_id'] = $_GET['property_id'];
    header("Location: login.php");
    exit();
}

// Retrieve property_id and set booking status to 'pending'
$property_id = $_GET['property_id'];
$user_id = $_SESSION['uid'];
$status = 'pending';

// Insert the booking into the database
$sql = "INSERT INTO bookings (user_id, property_id, status) VALUES ('$user_id', '$property_id', '$status')";
if (mysqli_query($con, $sql)) {
    echo "<p class='alert alert-success'>Booking request submitted! Your booking is pending approval.</p>";
} else {
    echo "<p class='alert alert-danger'>Failed to submit booking request. Please try again.</p>";
}
?>
