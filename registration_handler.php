<?php
session_start();
require_once "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password !== $cpassword) {
        $_SESSION['registration_error'] = "Passwords do not match.";
        header("Location: registration_page.php");
        exit();
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO registrations (name, email, phone, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $password_hash);

    if ($stmt->execute()) {
        header("Location: login_page.php");
        exit();
    } else {
        if ($conn->errno == 1062) {
            $_SESSION['registration_error'] = "This email address is already registered.";
        } else {
            $_SESSION['registration_error'] = "Error: Could not register user.";
        }
        header("Location: registration_page.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>