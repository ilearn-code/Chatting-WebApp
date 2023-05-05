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
    <!-- <div class="main"> -->
        <div class="continer">
            <div class="left">
             <?php
             require "db_conn.php";
             $propfilepic=$_SESSION['username'];
            $q_profile_pic= mysqli_query($conn,"SELECT * FROM user WHERE user='$propfilepic'");
            $row_profile_pic=mysqli_fetch_array($q_profile_pic);
            $img_pathp=$row_profile_pic['img_path'];
            $pp_name=$row_profile_pic['user'];
            echo "<img src=\"$img_pathp\" alt=\"error\">"; 
            echo '<strong id="n3">' . ucfirst($pp_name) . '</strong>';
             ?>
                
              
                
               <a id="logout" href="logout.php">Log out</a>

                    
                 
  
                
            </div>
            <div class="right">
            
            </div>

        </div>
        <div class="c1">
            <div class="l1">
                <div class="search">
                    <form class="searchform">
                    <button class="search_button"><i class="fa fa-search"></i></button>
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
    $img_path=$row['img_path'];
?>
<div class="listuser">

               
                 
    <a href="chat.php?myid=<?php echo $row['user']; ?>">  
    <img src="<?php echo $img_path ?>" height="40px"  width="40px"> 
    <strong id="nn"><?php echo ucfirst($row['user']);?></strong>
 <strong id="n2"><?php echo ucfirst($row['email']);?> </strong>
</a>
 

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



</div> 


        
          
               
 

           


         

</div>
</div>
                <div class="messagediv">
                    <!-- <div class="iemo">
                        <i class="uil uil-smile"></i>
                    </div>
                   -->
                    <form  >
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
       
    <!-- </div> -->
</body>
</html>