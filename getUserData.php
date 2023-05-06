<?php

  include "db_conn.php";

  $userId = $_GET['userId'];
  $result = mysqli_query($conn, "SELECT * FROM chat_messages WHERE `user_id` = '$userId' ORDER BY `created_at` ASC");

  $messages = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
  }

  header('Content-Type: application/json');
  echo json_encode($messages);
  mysqli_close($conn);
?>
