<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Log in</title>
    <link rel="stylesheet" href="css/loginform.css">
</head>
<body>
<?php
  require "db_conn.php";
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `user` WHERE user='$username'
                    AND password='$password'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<div class="loginForm">
<form  method="post" name="login">
        <h1>Login</h1>
        <input type="text"  name="username" placeholder="Username" />
        <br>
        <input type="password" name="password" placeholder="Password"/>
        <br>
        <input type="submit"  name="submit"/>
        <br>
       
  </form>
  <a class="button" href="./register.php">register</a>
</div>
    
<?php
    }
?>
</body>
</html>