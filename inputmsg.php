<?php 
	require "db_conn.php";
	session_start();
	
	
       $un = $_SESSION["username"];
	   $m = $_POST['msg'];
	   $subjectid=$_POST["subjectidd"];
	   $chatroom=$_SESSION['sender_id']+$subjectid;
	  
	   	    date_default_timezone_set('Asia/Kolkata');
	    $ts=date('y-m-d h:ia');
		
	$query = "INSERT INTO `gp_chat_db`(`chatroom`, `uname`, `msg`, `dt`) VALUES ('$chatroom','$un','$m','$ts');";
	

    if(mysqli_query($conn, $query)){
		header("Location: index.php");
	} else{
		die("error while executing the query". mysqli_error($conn));
	}
	
	// Close connection
	mysqli_close($conn);

?>