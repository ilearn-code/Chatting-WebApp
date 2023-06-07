<?php
session_start();
require "../db_conn.php";
// Destroy session
$_SESSION = array();

if (session_destroy()) {
    $response[] = "success";
} else {
    $response[] = "error";
}

// Output the response as JSON
echo json_encode($response);
mysqli_close($conn);
?>
