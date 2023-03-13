
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
   
<title>chat</title>

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
                

                <?php
                include "db_conn.php"; 
                $_SESSION['usernameselected']  = $_GET['myid'];
                $usernameselected=$_GET['myid'];
                $qq = "SELECT `id` FROM `user` WHERE user= '$usernameselected';";
                $rr = mysqli_query($conn,$qq);
                $rowud = mysqli_fetch_array($rr);
                $receiver_id=$rowud['id']; 
                
                $qq_pic = "SELECT `img_path` FROM `user` WHERE user= '$usernameselected';";
                $rr_pic= mysqli_query($conn,$qq_pic);
                $rowud_pic = mysqli_fetch_array($rr_pic);
                $img_path=$rowud_pic['img_path'];
               echo "<p>";
                echo "<img src=\"$img_path\" alt=\"error\">"; 
                echo '<strong id="n3">' . ucfirst($_SESSION['usernameselected']) . '</strong>';
                echo "</p>"
                 ?>

                <!-- <img src="img/2319174.png"   height="40px" width= "40px"alt=""> -->

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

               

<a href="chat.php?myid=<?php echo $row['user']; ?>">  
<img src="<?php echo $row['img_path'] ?>" height="40px"  width="40px"> 
<strong id="nn"><?php echo ucfirst($row['user']);?></strong>
<strong id="n2"><?php echo ucfirst($row['email']);?> </strong>
</a>


</div>
                     <?php      
                    }
                    
                   
                   endwhile; ?>
                   </div>
</div>
<div class="r1">
<div class="chatboxes">
<div class="chat" id="chatsid" >

<div id="chat-window">

</div>


        
          
</div>
</div>
                <div class="messagediv">
                
                
                    <form  id="myForm">
                    <!-- <textarea id="mytextarea"></textarea> -->
                    <input type="hidden"  name="receiver_id" value="<?php echo $receiver_id;?>">
                    <input type="text" class="inpmessage" id="inpmessageid" name="msg"  placeholder="Type a message">
                    <button type="submit" id="submitBtn" class="linkk"><i class="uil uil-message" style="color:white; margin-top: 15px;"></i></a>
                  </form >
                 
                 
                  </div>
            </div>
           

        </div>
       
    </div>
</body>

<script>
  document.getElementById("submitBtn").addEventListener("click", function(event) {
    event.preventDefault();
    sendData();
  });

  function sendData() {
  var formData = new FormData(document.getElementById("myForm"));
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "inputmsg.php", true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
    }
  };
  xhr.send(formData);
  document.getElementById('inpmessageid').value = "";
}

</script>

<script>
  function getChatMessages() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var messages = JSON.parse(this.responseText);
        document.getElementById('chat-window').innerHTML = '';
        for (var message of messages) {
          console.log(<?php echo $_SESSION['sender_id']; ?>);

          // Only show messages between the logged-in user and the other user
          if ((message.sender_id == <?php echo $_SESSION['sender_id']; ?> && message.receiver_id == <?php echo $receiver_id ?>) || (message.sender_id == <?php echo $receiver_id; ?> && message.receiver_id == <?php echo $_SESSION['sender_id']; ?>)) {
            var messageClass = message.sender_id== <?php echo $_SESSION['sender_id']; ?>?'rright' :'lleft';
            var chatBubble = '<div class="chat-bubble ' + messageClass + '">' + message.message+ '</div>';
            document.getElementById('chat-window').innerHTML += chatBubble;
          }
          
        }
 
      }
    };
    xhttp.open("GET", "getChatMessages.php", true);
    xhttp.send();
  }
 

  setInterval(getChatMessages, 1000);
</script> 




</html>