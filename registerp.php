<?php
    require "db_conn.php";
    

	   $name = $_POST["username"];
	   $email = $_POST["email"];
	   $pass = $_POST["password"];
	   $re_pass = $_POST["confirm"];
	   $secure_pass= password_hash($pass,PASSWORD_DEFAULT);

	   $file_tmp = $_FILES["profile_pic"]["tmp_name"];
		$file_name = $_FILES["profile_pic"]["name"];

		// $image_name = $_POST["img-name"];

		$file_path = "photo/".$file_name;	
		// mysqli_query($conn,"INSERT INTO image_table(img_name,img_path)VALUES('$image_name','$file_path')");

		move_uploaded_file($file_tmp,$file_path);

        if($pass == $re_pass){

	     $query ="INSERT INTO `user`( `id`, `user`,`password`, `email`, `img_path`) VALUES (UUID(),'$name','$secure_pass','$email','$file_path');";
		 move_uploaded_file($file_tmp,$file_path);
		 mysqli_query($conn, $query);
	        header('location:login.php');
	   }
		
	
        
        mysqli_close($conn);

    ?>