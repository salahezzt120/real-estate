<?php
session_start();
require("config.php");

// Check if admin is logged in
if (!isset($_SESSION['auser'])) {
    header("location:index.php");
    exit();
}

// Fetch all booking requests
$query = "SELECT bookings.*, property.title, user.uname 
          FROM bookings 
          JOIN property ON bookings.property_id = property.pid 
          JOIN user ON bookings.user_id = user.uid";
$result = mysqli_query($con, $query);

// Set headers for CSV download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="booking_requests.csv"');

// Open output stream
$output = fopen('php://output', 'w');

// Add CSV headers
fputcsv($output, array('Property', 'User', 'Phone Number', 'Booking Date', 'Status'));

// Add data rows
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, array(
        $row['title'],
        $row['uname'],
        $row['phone_number'],
        $row['booking_date'],
        $row['status']
    ));
}

fclose($output);
exit();
?>