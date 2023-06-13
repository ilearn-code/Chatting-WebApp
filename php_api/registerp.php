<?php
require "../db_conn.php";

// Initialize variables for error messages
$response = array();
$uploadOK = 1;

// Sanitize user inputs
function testInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Validate user inputs
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (empty($_POST['username'])) {
    $response['error_name'] = "Name is required";
  } else {
    $name = testInput($_POST['username']);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $response['error_ls'] = "Only letters and white space allowed";
    }
  }

  if (empty($_POST['email'])) {
    $response['error_email'] = "Email is required";
  } else {
    $email = testInput($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $response['error_email_format'] = "Invalid email format";
    }
  }

  if (empty($_POST['password'])) {
    $response['error_password'] = "Password is required";
  }

  if (empty($_POST['confirm'])) {
    $response['error_confirm'] = "Confirmation password is required";
  }

  // Check if passwords match
  $pass = $_POST["password"];
  $re_pass = $_POST["confirm"];
  if ($pass != $re_pass) {
    $response['error_password_match'] = "Passwords do not match";
  }

  // Validate and process uploaded image
  if (isset($_FILES["profile_pic"])) {
    $file_tmp = $_FILES["profile_pic"]["tmp_name"];
    $file_name = $_FILES["profile_pic"]["name"];
    $file_path =  "../photo/" . $file_name;
    $file_path2 =  "photo/" . $file_name;

    $check = getimagesize($file_tmp);
    $imageFileType = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

    if ($check === false) {
      $uploadOK = 0;
      $response['error_profile_pic'] = "Error: File is not an image";
    }

    if (file_exists($file_path)) {
      $uploadOK = 0;
      $response['error_profile_pic_exists'] = "Error: File already exists";
    }

    if ($_FILES["profile_pic"]["size"] > 500000) {
      $uploadOK = 0;
      $response['error_profile_pic_size'] = "Error: File size is too large";
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      $uploadOK = 0;
      $response['error_profile_pic_type'] = "Error: Only JPG, JPEG, PNG, and GIF files are allowed";
    }
  } else {
    $response['error_profile_pic'] = "Error: Profile picture is required";
  }
}

// Insert data into database if all validations are passed
if ($uploadOK == 1 && empty($response) && isset($file_path) && isset($name) && isset($email) && isset($pass)) {
  $secure_pass = password_hash($pass, PASSWORD_DEFAULT);

  $query = "INSERT INTO `user` (`id`, `user`, `password`, `email`, `img_path`) VALUES (UUID(), '$name', '$secure_pass', '$email', '$file_path2');";
  move_uploaded_file($file_tmp, $file_path);
  mysqli_query($conn, $query);

  $response['success'] = true;
  $response['message'] = "Registration successful";
}

mysqli_close($conn);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
