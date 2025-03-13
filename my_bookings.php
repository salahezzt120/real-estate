<?php
session_start();
require("config.php");

// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    header("location:login.php");
    exit();
}

// Fetch booking requests for the logged-in user
$user_id = $_SESSION['uid'];
$query = "SELECT bookings.*, property.title 
          FROM bookings 
          JOIN property ON bookings.property_id = property.pid 
          WHERE bookings.user_id = '$user_id'";
$result = mysqli_query($con, $query);

// Initialize flags for pending and rejected bookings
$hasPending = false;
$hasRejected = false;

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['status'] == 'pending') {
        $hasPending = true;
    } elseif ($row['status'] == 'rejected') {
        $hasRejected = true;
    }
}

// Reset the result pointer to the beginning for the table display
mysqli_data_seek($result, 0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta Tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Real Estate PHP">
    <meta name="keywords" content="">
    <meta name="author" content="Unicoder">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

    <!-- Css Link -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style>
        .alert-primary {
            background-color: #f0f8ff;
            border-color: #b6d7f2;
            color: #004085;
            border-radius: 10px;
            padding: 25px;
            font-size: 18px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .alert-primary .alert-heading {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #004085;
        }

        .alert-primary p {
            font-size: 16px;
            margin-bottom: 12px;
        }

        .alert-primary ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 12px;
            font-size: 16px;
        }

        .alert-primary ul li {
            margin-bottom: 8px;
        }

        .alert-primary .font-weight-bold {
            font-weight: bold;
        }

        .alert-primary .text-danger {
            color: #d9534f;
        }

        /* Responsive Table Styling */
        @media (max-width: 767.98px) {
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table thead {
                display: none; /* Hide headers on small screens */
            }

            table tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #dee2e6;
                border-radius: 8px;
            }

            table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0.75rem;
                text-align: right;
                border-bottom: 1px solid #dee2e6;
            }

            table td::before {
                content: attr(data-label);
                font-weight: 600;
                color: #333;
                margin-right: 1rem;
                text-align: left;
            }

            table td:last-child {
                border-bottom: none;
            }

            .badge {
                font-size: 0.9rem;
                padding: 0.5rem 0.75rem;
            }
        }

        /* General Table Styling */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #333;
        }

        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .badge-warning {
            background-color: #ffc107;
            color: #000;
        }

        .badge-success {
            background-color: #28a745;
            color: #fff;
        }

        .badge-danger {
            background-color: #dc3545;
            color: #fff;
        }

        /* Reduce Banner Height and Padding */
        .banner-full-row.page-banner {
            background-image: url('images/breadcromb.jpg');
            height: 200px; /* Adjust height as needed */
            padding-top: 20px; /* Adjust top padding */
            padding-bottom: 20px; /* Adjust bottom padding */
        }

        .banner-full-row .container .row {
            height: 100%;
            display: flex;
            align-items: center; /* Center the text vertically */
        }

        .page-name {
            font-size: 24px; /* Optional: adjust the font size */
        }

        .breadcrumb {
            font-size: 14px; /* Optional: adjust the breadcrumb size */
        }
    </style>

    <!-- Title -->
    <title>My Bookings</title>
</head>

<body>

    <!-- Header -->
    <?php include("include/header.php"); ?>
    <!-- /Header -->

    <!-- Main Content -->
    <div id="page-wrapper">
        <div class="row">
            <!-- Banner -->
            <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="page-name text-white text-uppercase mt-1 mb-0 text-center text-md-left"><b>My Bookings</b></h2>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb" class="float-md-right text-center text-md-left">
                                <ol class="breadcrumb bg-transparent m-0 p-0">
                                    <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">My Bookings</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Banner -->

            <!-- Booking Requests Table -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">My Bookings</h4>
                                </div>

                                <!-- Alert Messages -->
                                <?php if ($hasPending): ?>
                                    <div class="alert alert-info text-center">
                                        <h5 class="alert-heading">Booking Confirmation In Progress</h5>
                                        <p>Thank you for your booking! You’ll receive a quick call soon to confirm and approve your booking. Please be ready to answer promptly.</p>
                                        <p class="font-weight-bold text-danger">Your booking will be confirmed after the call.</p>
                                    </div>
                                <?php elseif ($hasRejected): ?>
                                    <div class="alert alert-danger text-center">
                                        <h5 class="alert-heading">Booking Rejected</h5>
                                        <p>We regret to inform you that your booking request has been rejected. Please contact support for further assistance.</p>
                                    </div>
                                <?php endif; ?>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Property</th>
                                                    <th>Phone Number</th>
                                                    <th>Booking Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                                    <tr>
                                                        <td data-label="Property"><?php echo htmlspecialchars($row['title']); ?></td>
                                                        <td data-label="Phone Number"><?php echo htmlspecialchars($row['phone_number']); ?></td>
                                                        <td data-label="Booking Date"><?php echo htmlspecialchars($row['booking_date']); ?></td>
                                                        <td data-label="Status">
                                                            <?php if ($row['status'] == 'pending'): ?>
                                                                <span class="badge badge-warning">Pending</span>
                                                            <?php elseif ($row['status'] == 'approved'): ?>
                                                                <span class="badge badge-success">Approved</span>
                                                            <?php elseif ($row['status'] == 'rejected'): ?>
                                                                <span class="badge badge-danger">Rejected</span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Booking Requests Table -->
        </div>
    </div>
    <!-- /Main Content -->

    <!-- Footer -->
    <?php include("include/footer.php"); ?>
    <!-- /Footer -->

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>