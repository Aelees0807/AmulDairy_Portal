<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="registration_page.css">
</head>
<body>
    <div class="form-container">
        <form action="registration_handler.php" method="POST">
            <h2>Registration Form</h2>

            <?php
            if (isset($_SESSION['registration_error'])) {
                echo '<p class="error">' . htmlspecialchars($_SESSION['registration_error']) . '</p>';
                unset($_SESSION['registration_error']);
            }
            ?>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword" required>
            </div>
            <button type="submit" class="submit-btn">Register</button>
            <div class="form-footer">
                <p>Already have an account? <a href="login_page.php">Login here</a></p>
            </div>
        </form>
    </div>
</body>
</html>