<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid_username = "fahim";
    $valid_password = " ";

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    }
    else {
        echo "Invalid username or password.";
    }
}
?>
