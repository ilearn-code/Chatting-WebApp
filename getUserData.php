<?php
session_start();
include "db_conn.php";

$userId = $_GET['userId'];
$loggedInUserId =$_SESSION["sender_id"];

$result = mysqli_query($conn, "SELECT * FROM chat_messages WHERE (`sender_id` = '$loggedInUserId' AND `receiver_id` = '$userId') OR (`sender_id` = '$userId' AND `receiver_id` = '$loggedInUserId') ORDER BY `created_at` ASC");

$messages = array();
while ($row = mysqli_fetch_assoc($result)) {
  $messages[] = $row;
}

header('Content-Type: application/json');
echo json_encode($messages);
mysqli_close($conn);
?>
