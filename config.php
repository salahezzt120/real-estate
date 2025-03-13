<?php

$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en'; // Default to 'en'

if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
}

$translations_file = "lang/$lang.json";
if (file_exists($translations_file)) {
    $translations = json_decode(file_get_contents($translations_file), true);
} else {
    // Fallback to English if file doesn't exist
    $translations = json_decode(file_get_contents("lang/en.json"), true);
}

// Check if translations were loaded correctly
if (!$translations) {
    echo "Error loading translations!";
    exit;
}


// Establish MySQL connection
$con = mysqli_connect("localhost", "root", "", "realestatephp");

// Check for connection errors
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
