<?php

function findUserByEmail($email) {
    $file = fopen("registrations.txt", "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $userData = explode(",", trim($line));
            if (count($userData) >= 2 && $userData[1] === $email) {
                fclose($file);
                return [
                    'name' => $userData[0],
                    'email' => $userData[1],
                    'phone' => $userData[2],
                    'password_hash' => $userData[3]
                ];
            }
        }
        fclose($file);
    }
    return null;
}

function storeTokenForUser($email, $token) {
    $file = fopen("tokens.txt", "a");
    if ($file) {
        fwrite($file, "$email,$token\n");
        fclose($file);
    }
}

function findTokenForUser($email, $token) {
    $file = fopen("tokens.txt", "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            list($fileEmail, $fileToken) = explode(",", trim($line));
            if ($fileEmail === $email && $fileToken === $token) {
                fclose($file);
                return true;
            }
        }
        fclose($file);
    }
    return false;
}

function deleteTokenForUser($email) {
    $lines = file('tokens.txt', FILE_IGNORE_NEW_LINES);
    $newLines = [];
    foreach ($lines as $line) {
        list($fileEmail, $fileToken) = explode(",", trim($line));
        if ($fileEmail !== $email) {
            $newLines[] = $line;
        }
    }
    file_put_contents('tokens.txt', implode("\n", $newLines));
}

?>