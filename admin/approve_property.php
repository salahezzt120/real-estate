<?php
session_start();
require("config.php");

if (!isset($_SESSION['auser'])) {
    header("location:index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "UPDATE property SET status = 'approved' WHERE pid = $id";
    if (mysqli_query($con, $query)) {
        header("location:admin_approve_property.php?msg=Property Approved Successfully");
    } else {
        header("location:admin_approve_property.php?error=Error Approving Property");
    }
} else {
    header("location:admin_approve_property.php?error=Invalid Property ID");
}
?>
