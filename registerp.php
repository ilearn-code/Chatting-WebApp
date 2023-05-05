<?php
    require "db_conn.php";
    
	$uploadOK=1;
	   $name = $_POST["username"];
	   $email = $_POST["email"];
	   $pass = $_POST["password"];
	   $re_pass = $_POST["confirm"];
	   $secure_pass= password_hash($pass,PASSWORD_DEFAULT);

	    $file_tmp = $_FILES["profile_pic"]["tmp_name"];
		$file_name = $_FILES["profile_pic"]["name"];

		$file_path = "photo/".$file_name;
		
		







		//image validation
	$check=getimagesize($file_tmp);
	$imageFileType=strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	if($check === false)
	{ $uploadOK=0;
		echo "Error :File is not a image";
		exit;
	}

	if(file_exists($file_path))
	{$uploadOK=0;
		echo "File already exits";
		exit;
	}

	if($_FILES["profile_pic"]["size"]> 500000)
	{$uploadOK=0;
		echo "Sorry, your life is too large.";
	}

	if($imageFileType!="jpg" && $imageFileType!="png"&& $imageFileType!="jpeg" && $imageFileType!="gif")
	{ $uploadOK=0;
		echo "Sorry only jpg , jpeg , png and gig are allowed. ";
	}


		// move_uploaded_file($file_tmp,$file_path);
if($uploadOK==0)
{

echo " Sorry , your file was not uploaded";
	
}

	else
	{

	

        if($pass == $re_pass){

	     $query ="INSERT INTO `user`( `id`, `user`,`password`, `email`, `img_path`) VALUES (UUID(),'$name','$secure_pass','$email','$file_path');";
		 move_uploaded_file($file_tmp,$file_path);
		 mysqli_query($conn, $query);
	        header('location:login.php');
	   }
		
	
	} 
        mysqli_close($conn);

    ?>