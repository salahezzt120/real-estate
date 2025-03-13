<header id="header" class="transparent-header-modern fixed-header-bg-white w-100">
    <div class="top-header bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="top-contact list-text-white d-table">
                        <li><a href="#"><i class="fas fa-phone-alt text-success mr-1"></i>+20 01022505987</a></li>
                        <li><a href="#"><i class="fas fa-envelope text-success mr-1"></i>alamein.estate@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="top-contact float-right">
                        <ul class="list-text-white d-table">
                            <li><i class="fas fa-user text-success mr-1"></i>
                            <?php if (isset($_SESSION['uemail'])) { ?>
                                <a href="logout.php"><?php echo $translations['logout']; ?></a>&nbsp;&nbsp;
                            <?php } else { ?>
                                <a href="login.php"><?php echo $translations['login_register']; ?></a>&nbsp;&nbsp;| 
                            </li>
                            <li><i class="fas fa-user-plus text-success mr-1"></i><a href="register.php"><?php echo $translations['register']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-nav secondary-nav hover-success-nav py-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a class="navbar-brand position-relative" href="index.php"><img class="nav-logo" src="images/logo/1111.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"> <a class="nav-link" href="index.php"><?php echo $translations['home']; ?></a></li>
                                <li class="nav-item"> <a class="nav-link" href="about.php"><?php echo $translations['about']; ?></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="contact.php"><?php echo $translations['contact']; ?></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="property.php"><?php echo $translations['house']; ?></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="my_bookings.php"><?php echo $translations['my_bookings']; ?></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="agent.php"><?php echo $translations['agent']; ?></a> </li>

                                <?php if (isset($_SESSION['uemail'])) { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $translations['my_account']; ?></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"> <a class="nav-link" href="profile.php"><?php echo $translations['profile']; ?></a> </li>
                                        <li class="nav-item"> <a class="nav-link" href="feature.php"><?php echo $translations['your_house']; ?></a> </li>
                                        <li class="nav-item"> <a class="nav-link" href="logout.php"><?php echo $translations['logout']; ?></a> </li>    
                                    </ul>
                                </li>
                                <?php } else { ?>
                                <li class="nav-item"> <a class="nav-link" href="login.php"><?php echo $translations['login_register']; ?></a> </li>
                                <?php } ?>
                            </ul>

                            

                            <a class="btn btn-success d-none d-xl-block" style="border-radius:30px;" href="submitproperty.php"><?php echo $translations['add_house']; ?></a> 
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
