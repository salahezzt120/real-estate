<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");

// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

// Get user ID
$user_id = $_SESSION['uid'];

// Check if the user already has a pending booking
$check_query = "SELECT * FROM bookings WHERE user_id = '$user_id' AND status = 'pending'";
$check_result = mysqli_query($con, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    // User already has a pending booking
    echo "<script>alert('You already have a pending booking. Please wait for it to be approved or rejected.'); window.location.href='propertydetail.php?pid={$_POST['property_id']}';</script>";
    header("location:my_bookings.php");
    exit();
}

// Get property ID from the URL
$property_id = $_GET['property_id'];

// Fetch property details
$property_query = mysqli_query($con, "SELECT * FROM property WHERE pid = '$property_id'");
$property = mysqli_fetch_assoc($property_query);

if (!$property) {
    die("Property not found.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone_number = $_POST['phone_number'];
    $user_id = $_SESSION['uid'];

    // Insert booking into the database
    $insert_query = "INSERT INTO bookings (property_id, user_id, phone_number, booking_date) 
                     VALUES ('$property_id', '$user_id', '$phone_number', NOW())";
    if (mysqli_query($con, $insert_query)) {
        echo "<script>alert('Booking confirmed!'); window.location.href='my_bookings.php';</script>";
    } else {
        echo "<script>alert('Error confirming booking.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Booking</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="page-wrapper">
        <div class="row">
            <!-- Header -->
            <?php include("include/header.php"); ?>
            
            <!-- Main Content -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <h2 class="text-center mb-4">Confirm Booking</h2>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                                </div>
                                
                                <div class="form-group">
                                <div class="form-group">
                                <label for="property_details">Property Details</label>
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Property Name</th>
                                                <td><?php echo htmlspecialchars($property['title']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Location</th>
                                                <td><?php echo htmlspecialchars($property['location']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Price</th>
                                                <td>$<?php echo number_format($property['price'], 2); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Bedroom</th>
                                                <td><?php echo htmlspecialchars($property['bedroom']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Size</th>
                                                <td><?php echo htmlspecialchars($property['size']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Type</th>
                                                <td><?php echo htmlspecialchars($property['type']); ?></td>
                                            </tr>
                                            
                                        </table>
                            <button type="submit" class="btn btn-success btn-block">Confirm Booking</button>
                                    </div>
                                </div>
                            </div>

            <!-- Footer -->
            <?php include("include/footer.php"); ?>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>