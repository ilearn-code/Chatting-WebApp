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

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $password = $_POST['password'];

    $query1 = "SELECT * FROM `user` WHERE user='$username'";

    $result = mysqli_query($conn, $query1);

    $rows = mysqli_num_rows($result);

    


    if ($rows == 1) {
        $_SESSION['username'] = $username;
       
        $query2 = "SELECT password FROM `user` WHERE user='$username'";
        $query3 = "SELECT id FROM `user` WHERE user='$username'";
        
        $result2 = mysqli_query($conn, $query2);
        $result3 = mysqli_query($conn, $query3);

        $roww=mysqli_fetch_array($result3);
        $_SESSION['sender_id']=$roww['id'];


       $row=mysqli_fetch_array($result2, MYSQLI_ASSOC);
        $hash = $row['password'];
        if(password_verify($password, $hash )){
            header("Location: index.php");
        } 
        else {

            echo $hash;
            echo "<div class='form'>
                      <h3>Incorrect Username/password</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                      </div>";
        }

    }
    
        else{
            echo "Invalid info2";
    }
    
}
     else {
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