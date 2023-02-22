<?php

  include "db_conn.php";

  // Get the chat messages from the database
  $result = mysqli_query($conn, "SELECT * FROM chat_messages ORDER BY `created_at` ASC");

  // Convert the result to an array of objects
  $messages = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
  }

  // Send the messages as a JSON response
  // header('Content-Type: application/json');
  echo json_encode($messages);
  mysqli_close($conn);
?>
