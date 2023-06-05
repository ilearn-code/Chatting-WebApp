<?php
session_start();
require "db_conn.php";

$response = array(); // Create an array to store the response data

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $response['error'] = "Invalid username format. Only letters, numbers, and underscores are allowed.";
    }

    // Validate password
    // if (strlen($password) < 6) {
    //     $response['error'] = "Password must be at least 6 characters long.";
    // }

    if (!isset($response['error'])) {
        // Perform database query and login verification
        $query = "SELECT * FROM `user` WHERE user='$username'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            $row = mysqli_fetch_assoc($result);
            $hash = $row['password'];

            if (password_verify($password, $hash)) {
                $_SESSION['username'] = $username;
                $_SESSION['sender_id'] = $row['id'];

                $response['success'] = "Login successful";
            } else {
                $response['error'] = "Incorrect password";
            }
        } else {
            $response['error'] = "Invalid username";
        }
    }
} else {
    $response['error'] = "Missing username or password";
}

header('Content-Type: application/json');
echo json_encode($response);
?>
