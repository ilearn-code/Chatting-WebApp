<?php 
	require "db_conn.php";
	session_start();
	
	
      
	   $m = $_POST['msg'];
	   $subjectid=$_POST["subjectidd"];
	   $sender_id=$_SESSION['sender_id'];
	
	  
	   	
	    $ts=date('Y-m-d H:i:s');
		date_default_timezone_set('Asia/Kolkata');

	$query = "INSERT INTO `chat_messages`(`id`, `sender_id`, `receiver_id`, `message`, `created_at`) VALUES (null,'$sender_id',' $subjectid','$m','$ts')";
	
	
    if(mysqli_query($conn, $query)){
		// header('location:chat.php')
	} else{
		die("error while executing the query". mysqli_error($conn));
	}
	
	// Close connection
	mysqli_close($conn);

?>