<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
  
  require "db_conn.php";
  
  // SQL QUERY'
  $query = "SELECT * FROM `user` WHERE `user`='user1'";
  
  // FETCHING DATA FROM DATABASE
  $result = $conn->query($query);
  
  
        // OUTPUT DATA OF EACH ROW
$row = $result->fetch_assoc();
      
            echo $row['password'];
        
    
  
   $conn->close();
  
?>
</body>
</html>