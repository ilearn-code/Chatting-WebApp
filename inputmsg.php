<?php 
	require "db_conn.php";
	session_start();
	
	
       $sender_id = $_SESSION["sender_id"];
	   $recevier_id=$_SESSION["reciver_idd"];
	   $message = $_POST['msg'];
			
	    date_default_timezone_set('Asia/Kolkata');
	    $ts=date('y-m-d h:ia');
		
		$chatid=(int)$sender_id+(int)$recevier_id;
	
	$query = "INSERT INTO `chat`(`chatid`, `sender_userid`, `reciever_userid`, `message`, `timestamp`)  VALUES ('$chatid','$sender_id','$recevier_id','$message','$ts')";
	

    if(mysqli_query($conn, $query)){
		header("Location: index.php");
	} else{
		die("error while executing the query". mysqli_error($conn));
	}
	
	// Close connection
	mysqli_close($conn);

?>
