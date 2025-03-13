<?php 
session_start();
include("config.php");
$error = "";

if (isset($_POST['login'])) {
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['pass'];
    $pass = sha1($pass);

    if (!empty($user) && !empty($pass)) {
        $query = "SELECT auser, apass FROM admin WHERE auser='$user' AND apass='$pass'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $num_row = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        if ($num_row == 1) {
            $_SESSION['auser'] = $user;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = '* Invalid User Name and Password';
        }
    } else {
        $error = "* Please Fill all the Fields!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>RE Admin - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Custom CSS for Mobile Improvements -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .loginbox {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
        }

        .login-right {
            padding: 30px;
        }

        .login-right-wrap {
            text-align: center;
        }

        .login-right-wrap h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .account-subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            height: 45px;
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            height: 45px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }

        @media (max-width: 576px) {
            .loginbox {
                border-radius: 0;
                box-shadow: none;
            }

            .login-right {
                padding: 20px;
            }

            .login-right-wrap h1 {
                font-size: 20px;
            }

            .account-subtitle {
                font-size: 12px;
            }

            .form-control {
                height: 40px;
                font-size: 13px;
            }

            .btn-primary {
                height: 40px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <!-- Main Wrapper -->
    <div class="login-wrapper">
        <div class="loginbox">
            <div class="login-right">
                <div class="login-right-wrap">
                    <h1>Admin Login Panel</h1>
                    <p class="account-subtitle">Access to our dashboard</p>
                    <?php if (!empty($error)): ?>
                        <p class="error-message"><?php echo $error; ?></p>
                    <?php endif; ?>

                    <!-- Login Form -->
                    <form method="post">
                        <div class="form-group">
                            <input class="form-control" name="user" type="text" placeholder="User Name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="pass" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
</body>

</html>