<?php
// Add this line to include the file with the function definition
require_once "user_functions.php";

if (isset($_COOKIE['remember_me_cookie']) && !isset($_SESSION['user'])) {
    $cookie_data = json_decode(base64_decode($_COOKIE['remember_me_cookie']), true);
    $email = $cookie_data['email'];
    $token = $cookie_data['token'];

    // This line will now work correctly
    if (findTokenForUser($email, $token)) {
        $user = findUserByEmail($email);
        if ($user) {
            $_SESSION['user'] = [
                'name' => $user['name'],
                'email' => $user['email']
            ];
        }
    }
}
?>