<?php

require "db_conn.php";
session_start();
if (isset($_SESSION['sender_id']) && isset($_POST["receiver_id"]) && isset($_POST['msg'])) {
	$m = $_POST['msg'];
	$receiver_id = $_POST["receiver_id"];
	$sender_id = $_SESSION['sender_id'];


	$ts = date('Y-m-d H:i:s');
	date_default_timezone_set('Asia/Kolkata');

	$query = "INSERT INTO `chat_messages`(`id`, `sender_id`, `receiver_id`, `message`, `created_at`) VALUES (null,'$sender_id','$receiver_id','$m','$ts')";


	if (mysqli_query($conn, $query)) {
		echo "success";
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
}

mysqli_close($conn);

?>