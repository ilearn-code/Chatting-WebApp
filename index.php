<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div class="continer">
            <div class="left">
                <img src="img/Smiling-Man-PNG-Download-Image.png" alt="" >
                <div class="ic">
                    <i class="uil uil-comment-alt-lines"></i>
                </div>
                
               <a id="logout" href="logout.php">Log out</a>
                    
                 
  
                
            </div>
            <div class="right">
                <img src="img/Smiling-Man-PNG-Download-Image.png" alt="" >
                <h3 id="h3" >&nbsp;&nbsp;Rohan Sharama</h3>
                <img src="img/2319174.png"   height="40px" width= "40px"alt="">
            </div>

        </div>
        <div class="c1">
            <div class="l1">
                <div class="search">
                    <form class="searchform">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    <input type="text" placeholder="Search">
                  </form>
                  
                  </div>
                  <div class="listscroll" >
                   
<?php
require "db_conn.php";
 
$query = "SELECT * FROM `user`";
 $run = mysqli_query($conn,$query);
 
  
 while($row = mysqli_fetch_array($run)) :
 if($_SESSION["username"]!=$row['user']){
?>
<div class="listuser">
    <a href="_blank"> <?php echo $row['user']; ?></a>
   
</div>
  <?php      
 }
 

endwhile; ?>
</div>

                    
                  </div>
            </div>
            <div class="r1">
<div class="chatboxes">
<div class="chat">



<div class="inner_div" id="chathist">
<?php
require "db_conn.php";
 
$query = "SELECT * FROM `gp_chat_db`";
 $run = mysqli_query($conn,$query);
 
  
 while($row = mysqli_fetch_array($run)) :
 if($_SESSION["username"]!=$row['uname']){
 ?>
 
 <div id="message" class="message">
 <span style="color:black;float:left;">
  <?php echo $row['msg']; ?>
 </span> <br/>
 <div>
  <span style="color:black;float:right;
   font-size:10px;clear:both;">
   <?php echo $row['uname']; ?>, <?php echo $row['dt']; ?>
 </span>
 </div>
</div>
<br/><br/>
 <?php
 }
else
{

?>
 
 <div id="message1" class="message1" >
 <span style="color:black;float:right;">
 <?php echo $row['msg']; ?></span> <br/>
 <div>
  <span style="color:black;float:left;
          font-size:10px;clear:both;">
   <?php echo $row['uname']; ?>,
        <?php echo $row['dt']; ?>
 </span>
</div>
</div>
<br/><br/>
<?php
}

endwhile; ?>
</div>


        
          
               
 

           


         

</div>
</div>
                <div class="messagediv">
                    <!-- <div class="iemo">
                        <i class="uil uil-smile"></i>
                    </div>
                   -->
                    <form action="inputmsg.php" method="post"  >
                   <!-- <input type="text" class="inpname"  name="uname"> -->
                    <input type="text" class="inpmessage" name="msg" placeholder="Type a message">
                    <button type="submit" class="linkk"><i class="uil uil-message" style="color:white; margin-top: 15px;"></i></a>
                  </form >
                  <!-- <div class="iaud">
                    <img src="./mike.png" height="25px" width= "30px" alt="">
                  </div> -->
                  
                  </div>
            </div>
           

        </div>
       
    </div>
</body>
</html>