<?php
session_start(); // Start the session

include('config.php'); // Include config.php to handle language and DB connection

// Check if the language is set in the query string
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang']; // Store the selected language in the session
}

// Set the language based on the session or default to 'en'
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
?>

<!DOCTYPE html>
<html lang="<?php echo ($lang === 'ar') ? 'ar' : 'en'; ?>">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Real Estate PHP</title>

    <style>
        /* Language switcher styling */
        .language-switcher {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 999;
            background: rgba(0, 0, 0, 0.7);
            padding: 10px;
            border-radius: 5px;
        }

        .language-switcher select {
            background-color: #ffffff;
            border: 1px solid #ccc;
            color: #333;
            padding: 5px 15px;
            border-radius: 5px;
            font-size: 16px;
        }

        /* For mobile views */
        @media (max-width: 768px) {
            .language-switcher {
                top: 20px;
                right: 20px;
            }
        }
    </style>
</head>

<body dir="<?php echo ($lang === 'ar') ? 'rtl' : 'ltr'; ?>">

<div id="page-wrapper">
    <div class="row">
        <!-- Header -->
        <?php include("include/header.php"); ?>

        <!-- Language Switcher -->
        <div class="language-switcher">
            <form action="" method="get">
                <select name="lang" onchange="this.form.submit()" class="lang-select">
                    <option value="en" <?php echo ($lang === 'en') ? 'selected' : ''; ?>>English</option>
                    <option value="ar" <?php echo ($lang === 'ar') ? 'selected' : ''; ?>>العربية</option>
                </select>
            </form>
        </div>

        <!-- All Properties -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-secondary double-down-line text-center mb-4">
                            <?php echo $translations['available_properties']; ?>
                        </h2>
                    </div>
                    <div class="col-md-12">
                        <div class="tab-content mt-4" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home">
                                <div class="row">
                                    <?php
                                    // Fetch only approved properties
                                    $query = mysqli_query($con, "SELECT property.*, user.uname, user.utype, user.uimage 
                                                                  FROM property, user 
                                                                  WHERE property.uid = user.uid AND property.status = 'approved' 
                                                                  ORDER BY date DESC");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="featured-thumb hover-zoomer mb-4">
                                            <div class="overlay-black overflow-hidden position-relative"> 
                                                <img src="admin/property/<?php echo $row['18']; ?>" alt="pimage">
                                                <div class="featured bg-success text-white"><?php echo $translations['new']; ?></div>
                                                <div class="sale bg-success text-white text-capitalize"><?php echo $translations['for'] . " " . $row['5']; ?></div>
                                                <div class="price text-primary">
                                                    <b>$<?php echo $row['13']; ?> </b>
                                                    <span class="text-white"><?php echo $row['12']; ?> <?php echo $translations['sqft']; ?></span>
                                                </div>
                                            </div>
                                            <div class="featured-thumb-data shadow-one">
                                                <div class="p-3">
                                                    <h5 class="text-secondary hover-text-success mb-2 text-capitalize">
                                                        <a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a>
                                                    </h5>
                                                    <span class="location text-capitalize">
                                                        <i class="fas fa-map-marker-alt text-success"></i> <?php echo $row['14']; ?>
                                                    </span>
                                                </div>
                                                <div class="bg-gray quantity px-4 pt-4">
                                                    <ul>
                                                        <li><span><?php echo $row['12']; ?></span> <?php echo $translations['sqft']; ?></li>
                                                        <li><span><?php echo $row['6']; ?></span> <?php echo $translations['beds']; ?></li>
                                                        <li><span><?php echo $row['7']; ?></span> <?php echo $translations['baths']; ?></li>
                                                        <li><span><?php echo $row['9']; ?></span> <?php echo $translations['kitchen']; ?></li>
                                                        <li><span><?php echo $row['8']; ?></span> <?php echo $translations['balcony']; ?></li>
                                                    </ul>
                                                </div>
                                                <div class="p-4 d-inline-block w-100">
                                                    <div class="float-left text-capitalize">
                                                        <i class="fas fa-user text-success mr-1"></i> <?php echo $translations['by']; ?>: <?php echo $row['uname']; ?>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- All Properties -->

        <!-- Footer -->
        <?php include("include/footer.php"); ?>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>