<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css\login_form.css">
</head>
<body>
<?php
session_start();
  require "db_conn.php";
    

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $password = $_POST['password'];

    $query1 = "SELECT * FROM `user` WHERE user='$username'";

    $result = mysqli_query($conn, $query1);

    $rows = mysqli_num_rows($result);

    


    if ($rows == 1) {
       
       
        $query2 = "SELECT password FROM `user` WHERE user='$username'";
        $query3 = "SELECT id FROM `user` WHERE user='$username'";
        
        $result2 = mysqli_query($conn, $query2);
        $result3 = mysqli_query($conn, $query3);

        $roww=mysqli_fetch_array($result3);
       


       $row=mysqli_fetch_array($result2, MYSQLI_ASSOC);
        $hash = $row['password'];
        if(password_verify($password, $hash )){
              $_SESSION['username'] = $username;
            $_SESSION['sender_id']=$roww['id'];
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
<div class="centered">
<form  method="post" name="login">
        <h1>Realtime Chat App</h1>
        <input type="text"  name="username" placeholder="Username"/>
        <input type="password" name="password" placeholder="Password"/>
        <button type="submit" name="submit">Continue to chat</button>
  </form>
  <span>Not yet signed up?<a href="./register.php">Signup Now</a></span>
</div>
</div>   
<?php
    }
?>
</body>
</html>