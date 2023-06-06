<?php
session_start();
// Destroy session
$_SESSION = array();

if (session_destroy()) {
    $response[] = "success";
} else {
    $response[] = "error";
}

// Output the response as JSON
echo json_encode($response);
?>
