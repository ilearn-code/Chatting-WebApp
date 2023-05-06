<?php
require "db_conn.php";

// Initialize variables for error messages
$nameErr= $emailErr= "";
$uploadOK = 1;

// Sanitize user inputs
function testInput($data) {
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Validate user inputs
if ($_SERVER['REQUEST_METHOD'] == "POST") { 
  if (empty($_POST['username'])) {
    $nameErr = "Name is required";
  } else {
    $name = testInput($_POST['username']);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST['email'])) {
    $emailErr = "Email is required";
  } else {
    $email = testInput($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
}

// Validate and process uploaded image
if (isset($_FILES["profile_pic"])) {
  $file_tmp = $_FILES["profile_pic"]["tmp_name"];
  $file_name = $_FILES["profile_pic"]["name"];
  $file_path = "photo/" . $file_name;
  $check = getimagesize($file_tmp);
  $imageFileType = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

  if ($check === false) {
    $uploadOK = 0;
    echo "Error: File is not an image";
    exit;
  }

  if (file_exists($file_path)) {
    $uploadOK = 0;
    echo "Error: File already exists";
    exit;
  }

  if ($_FILES["profile_pic"]["size"] > 500000) {
    $uploadOK = 0;
    echo "Error: File size is too large";
  }

  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    $uploadOK = 0;
    echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed";
  }
}

// Insert data into database if all validations are passed
if ($uploadOK == 1 && $nameErr == "" && $emailErr == "" && isset($file_path) && isset($_POST['password']) && isset($_POST['confirm'])) {
  $pass = $_POST["password"];
  $re_pass = $_POST["confirm"];
  $secure_pass = password_hash($pass, PASSWORD_DEFAULT);

  if ($pass == $re_pass) {
    $query = "INSERT INTO `user` (`id`, `user`, `password`, `email`, `img_path`) VALUES (UUID(), '$name', '$secure_pass', '$email', '$file_path');";
    move_uploaded_file($file_tmp, $file_path);
    mysqli_query($conn, $query);
    header('Location: login.php');
  }
}

mysqli_close($conn);
?>
