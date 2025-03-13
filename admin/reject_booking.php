<?php
session_start();
require("config.php");

// Check if admin is logged in
if (!isset($_SESSION['auser'])) {
    header("location:index.php");
    exit();
}

// Get booking ID from the URL
$booking_id = $_GET['id'];

// Fetch booking details
$query = "SELECT bookings.*, property.title, user.uname, user.uemail 
          FROM bookings 
          JOIN property ON bookings.property_id = property.pid 
          JOIN user ON bookings.user_id = user.uid 
          WHERE bookings.id = '$booking_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

// Update the booking status to "rejected"
$update_query = "UPDATE bookings SET status = 'rejected' WHERE id = '$booking_id'";
if (mysqli_query($con, $update_query)) {
    // Send email notification
    $to = $row['uemail'];
    $subject = "Booking Rejected";
    $message = "Your booking for " . $row['title'] . " has been rejected.";
    $headers = "From: no-reply@example.com";
    mail($to, $subject, $message, $headers);

    echo "<script>alert('Booking rejected!'); window.location.href='booking_request.php';</script>";
} else {
    echo "<script>alert('Error rejecting booking.'); window.location.href='booking_request.php';</script>";
}
?>