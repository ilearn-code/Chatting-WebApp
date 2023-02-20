

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
                <h3 id="h3" >&nbsp;&nbsp;<?php
                include "db_conn.php"; 
                $_SESSION['usernameselected']  = $_GET['myid'];
                $usernameselected=$_GET['myid'];
                echo  $_SESSION['usernameselected']; ?></h3>
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
                    session_start();
                   $query = "SELECT * FROM `user`";
                    $run = mysqli_query($conn,$query);
                    
                     
                    while($row = mysqli_fetch_array($run)) :
                    if($_SESSION["username"]!=$row['user']){
                   ?>
                   <div class="listuser">
                   <a href="chat.php?myid=<?php echo $row['user']; ?>"> <?php echo $row['user'];?> 

</a>
  
                     
                   
                   </div>
                     <?php      
                    }
                    
                   
                   endwhile; ?>
                   </div>
</div>
<div class="r1">
<div class="chatboxes">
<div class="chat">



<div class="inner_div" id="chathist">
<?php
require "db_conn.php";
$qq = "SELECT `id` FROM `user` WHERE user= '$usernameselected'; ";
$rr = mysqli_query($conn,$qq);
$rowud = mysqli_fetch_array($rr);
$myuserid=$rowud['id'];


$chatroom=$_SESSION['sender_id']+$myuserid;
$query = "SELECT * FROM `gp_chat_db` WHERE `chatroom`='$chatroom';";
 $run = mysqli_query($conn,$query);
 
 


 
 while($row = mysqli_fetch_array($run)) :
  // if($row['uname']=$subjectId || $row['uname']=$_SESSION["username"]){
  
 if($_SESSION["username"]!=$row["uname"]){
 ?>
 
 <div id="message" class="message">
 <span style="color:black;float:left;">
  <?php echo $row['msg']; echo $_SESSION["username"];?>
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
   
  
endwhile; 

?>
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
                    
                    <input type="hidden"  name="subjectidd" value="<?php echo $myuserid;?>">
                    <button type="submit" class="linkk"><i class="uil uil-message" style="color:white; margin-top: 15px;"></i></a>
                  </form >
                  <!-- <div class="iaud">
                    <img src="./mike.png" height="25px" width= "30px" alt="">
                  </div> -->
                 
                  </div>
            </div>
           

        </div>
       <?php unset($_SESSION['usernameselected']); ?>
    </div>
</body>
</html>