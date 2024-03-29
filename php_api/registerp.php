<?php
require "../db_conn.php";

// Initialize variables for error messages
$response = array();
$uploadOK = 1;

// Sanitize user inputs
function testInput($data)
{
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
            $response['error_name'] = "Only letters and white space allowed in username";
        }
    }

    if (empty($_POST['email'])) {
        $response['error_email'] = "Email is required";
    } else {
        $email = testInput($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['error_email'] = "Invalid email format";
        }
        else {
            $allowedDomains = array(
                'gmail.com',
                'yahoo.com',
                'outlook.com',
                'hotmail.com',
                'aol.com',
                'icloud.com',
                'mail.com',
                'gmx.com',
                'zoho.com',
                'yandex.com',
                'protonmail.com',
                'mail.ru',
                'live.com',
                'yahoo.co.jp',
                'rediffmail.com',
                'cox.net',
                'msn.com',
                'sbcglobal.net',
                'verizon.net',
                'att.net',
                'mac.com',
                'me.com',
                'optonline.net',
                'earthlink.net',
                'rocketmail.com',
                'mailinator.com',
                'inbox.com',
                'comcast.net',
                'shaw.ca',
                'bellsouth.net',
                'charter.net',
                'juno.com',
                'roadrunner.com',
                'windstream.net',
                'frontier.com',
                'aim.com',
                'zoho.eu',
                'outlook.co.id',
                'bluewin.ch',
                'web.de',
                't-online.de',
                'telus.net',
                'sympatico.ca',
                'icloud.de',
                'gmx.de',
                'libero.it',
                'o2.pl',
                'naver.com',
                'hanmail.net',
                'daum.net',
                'netzero.net',
                'yahoo.com.tw'
            );
          
            $domain = substr(strrchr($email, "@"), 1);
            if (!in_array($domain, $allowedDomains)) {
                $response['error_email'] = "Email domain is not allowed";
            }
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
        $file_name = basename($_FILES["profile_pic"]["name"]);
        
        // Generate a random name for the file
        $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $new_file_name = uniqid() . '.' . $extension;
        
        $file_path = "../photo/" . $new_file_name;
        $file_path2 = "photo/" . $new_file_name;

        $check = getimagesize($file_tmp);
        $imageFileType = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

        if ($check === false) {
            $uploadOK = 0;
            $response['error_profile_pic'] = "Error: File is not an image";
        }

        if (file_exists($file_path)) {
            $uploadOK = 0;
            $response['error_profile_pic'] = "Error: File already exists";
        }

        if ($_FILES["profile_pic"]["size"] > 500000) {
            $uploadOK = 0;
            $response['error_profile_pic'] = "Error: File size is too large";
        }

        if (!in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
            $uploadOK = 0;
            $response['error_profile_pic'] = "Error: Only JPG, JPEG, PNG, and GIF files are allowed";
        }
    } else {
        $response['error_profile_pic'] = "Error: Profile picture is required";
    }
}

// Insert data into database if all validations are passed
if ($uploadOK == 1 && empty($response) && isset($file_path) && isset($name) && isset($email) && isset($pass)) {
    // Check if username or email already exists in the database using prepared statements
    $query = "SELECT * FROM `user` WHERE `user`=? OR `email`=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $response['error_exists'] = "Username or email already exists";
    } else {
        $secure_pass = password_hash($pass, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO `user` (`id`, `user`, `password`, `email`, `img_path`) VALUES (UUID(), ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $secure_pass, $email, $file_path2);
        if(mysqli_stmt_execute($stmt))
{

    move_uploaded_file($file_tmp, $file_path);

    $response['success'] = true;
    $response['message'] = "Registration successful";
}
      
    }
}

mysqli_close($conn);

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

// Send JSON response

header('Content-Type: application/json');
echo json_encode($response);
?>
