<?php 
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");

// Fetch approved properties
$query = mysqli_query($con, "SELECT property.*, user.uname, user.utype, user.uimage FROM `property`, `user` WHERE property.uid = user.uid AND property.status = 'approved'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Real Estate PHP</title>
</head>
<body>
<div id="page-wrapper">
    <div class="row"> 
        <!-- Header -->
        <?php include("include/header.php"); ?>
        <!-- Property Grid -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <?php while ($row = mysqli_fetch_array($query)) { ?>
                            <div class="col-md-6">
                                <div class="featured-thumb hover-zoomer mb-4">
                                    <div class="overlay-black overflow-hidden position-relative">
                                        <img src="admin/property/<?php echo $row['18']; ?>" alt="pimage">
                                        <div class="sale bg-success text-white">For <?php echo $row['5']; ?></div>
                                        <div class="price text-primary text-capitalize">$<?php echo $row['13']; ?> <span class="text-white"><?php echo $row['12']; ?> Sqft</span></div>
                                    </div>
                                    <div class="featured-thumb-data shadow-one">
                                        <div class="p-4">
                                            <h5 class="text-secondary hover-text-success mb-2 text-capitalize">
                                                <a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a>
                                            </h5>
                                            <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i> <?php echo $row['14']; ?></span>
                                        </div>
                                        <div class="px-4 pb-4 d-inline-block w-100">
                                            <div class="float-left text-capitalize">
                                                <i class="fas fa-user text-success mr-1"></i> By: <?php echo $row['uname']; ?>
                                            </div>
                                            <div class="float-right">
                                                <i class="far fa-calendar-alt text-success mr-1"></i> <?php echo date('d-m-Y', strtotime($row['date'])); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Recently Added Properties -->
                        <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4 mt-5">Recently Added Properties</h4>
                        <ul class="property_list_widget">
                            <?php
                            $recent_query = mysqli_query($con, "SELECT * FROM `property` WHERE status = 'approved' ORDER BY date DESC LIMIT 6");
                            while ($recent = mysqli_fetch_array($recent_query)) {
                            ?>
                            <li>
                                <img src="admin/property/<?php echo $recent['18']; ?>" alt="pimage">
                                <h6 class="text-secondary hover-text-success text-capitalize">
                                    <a href="propertydetail.php?pid=<?php echo $recent['0']; ?>"><?php echo $recent['1']; ?></a>
                                </h6>
                                <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> <?php echo $recent['14']; ?></span>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
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