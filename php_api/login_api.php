<?php
session_start();
require "../db_conn.php";

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
                // Generate a unique session ID for the user
                $session_id = generateUniqueSessionId();

                // Store session ID and user ID in the database
                $userId = $row['id'];
                storeSessionData($session_id, $userId);

                // Set session variables
                $_SESSION['session_id'] = $session_id;
                $_SESSION['username'] = $username;
                $_SESSION['sender_id'] = $userId;
                $_SESSION['img_path'] = $row['img_path'];

                $response['success'] = array(
                    'username' => $username,
                    'sender_id' => $userId,
                    'img_path' => $row['img_path']
                );
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

// Function to generate a unique session ID
function generateUniqueSessionId() {
    return uniqid();
}

// Function to store session data in the database
function storeSessionData($session_id, $user_id) {
    // Implement your code to store the session data in the database
    // Store the session_id and user_id in a table that associates the session data with each user
    // You can create a new table or modify an existing one for this purpose
    // Ensure proper security measures are in place to prevent SQL injection or unauthorized access
}

?>
