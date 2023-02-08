<?php 
	require "db_conn.php";
	session_start();
	// Escape user inputs for security
	// $un= mysqli_real_escape_string(
	// 		$link, $_REQUEST['uname']);
       $un = $_SESSION["username"];
	   $m = $_POST['msg'];
			
	    date_default_timezone_set('Asia/Kolkata');
	    $ts=date('y-m-d h:ia');
	
	// Attempt insert query execution
	$query = "INSERT INTO `gp_chat_db`(`uname`,`msg`,`dt`) VALUES ('$un','$m','$ts');";
	// $query ="INSERT INTO `message_chat`(`message`) VALUES ('$m');";

    if(mysqli_query($conn, $query)){
		header("Location: index.php");
	} else{
		die("error while executing the query". mysqli_error($conn));
	}
	
	// Close connection
	mysqli_close($conn);

?>
