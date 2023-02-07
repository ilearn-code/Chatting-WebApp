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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div class="continer">
            <div class="left">
                <img src="./Smiling-Man-PNG-Download-Image.png" alt="" >
                <div class="ic">
                    <i class="uil uil-comment-alt-lines"></i>
                </div>
                
               <a id="logout" href="logout.php">Log out</a>
                    
                 
  
                
            </div>
            <div class="right">
                <img src="./Smiling-Man-PNG-Download-Image.png" alt="" >
                <h3 id="h3" >&nbsp;&nbsp;Rohan Sharama</h3>
                <img src="./2319174.png"   height="40px" width= "40px"alt="">
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
            </div>
            <div class="r1">
<div class="chatboxes">
<div class="chat">



<div class="inner_div" id="chathist">
<?php
require "db_conn.php";
 
$query = "SELECT * FROM `gp_chat_db`";
 $run = $conn->query($query);
 $i=0;
  
 while($row = $run->fetch_array()) :
 if($i==0){
 $i=5;
 $first=$row;
 ?>
 
 <div id="message1" class="message1">
 <span style="color:white;float:right;">
  <?php echo $row['msg']; ?>
 </span> <br/>
 <div>
  <span style="color:black;float:left;
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
if($row['uname']!=$first['uname'])
{
?>
 
 <div id="message" class="message">
 <span style="color:white;float:left;">
 <?php echo $row['msg']; ?></span> <br/>
 <div>
  <span style="color:black;float:right;
          font-size:10px;clear:both;">
   <?php echo $row['uname']; ?>,
        <?php echo $row['dt']; ?>
 </span>
</div>
</div>
<br/><br/>
<?php
}
else
{
?>
 
 <div id="message1" class="message1">
 <span style="color:white;float:right;">
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
                   <input type="text" class="inpname"  name="uname" value="u1">
                    <input type="text" class="inpmessage" name="msg" placeholder="Type a message">
                    <input type="submit" class="sub_">
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