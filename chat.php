
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

  
        <div class="continer">
          
            <div class="left">

            <?php
            session_start();
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
                    <button class="search_button"><i class="fa fa-search"></i></button>
                    <input type="text" placeholder="Search">
                  </form>
                  
                  </div>
                  
                  
                  <div class="listscroll" >
                   
                   <?php
                   require "db_conn.php";
                    // session_start();
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
                   
                    <input type="hidden"  name="receiver_id" value="<?php echo $receiver_id;?>">
                    <input type="text" class="inpmessage" id="inpmessageid" name="msg"  placeholder="Type a message">
                    <button type="submit" id="submitBtn" class="linkk"><i class="uil uil-message" style="color:white; margin-top: 15px;"></i></a>
                  </form >
                 
                 
                  </div>
            </div>
           

        </div>
       
  
</body>
<script>

// Add event listener to the submit button to prevent default form submission and send data using fetch API
document.getElementById("submitBtn").addEventListener("click", function(event) {
  event.preventDefault();
  sendData();
});

// Function to send data using fetch API
function sendData() {
  const form = document.getElementById("myForm");
  const formData = new FormData(form);
  fetch("inputmsg.php", {
    method: "POST",
    body: formData
  })
  .then(response => {
    console.log(response);
  })
  .catch(error => {
    console.error(error);
  });
  document.getElementById('inpmessageid').value = "";
}
</script>
<script>

// Function to get chat messages using fetch API
function getChatMessages() {
  fetch("getChatMessages.php")
  .then(response => {
    if (response.ok) {
      return response.json();
    } else {
      throw new Error('Network response was not ok.');
    }
  })
  .then(messages => {
    document.getElementById('chat-window').innerHTML = '';
    for (let message of messages) {
      console.log(<?php echo $_SESSION['sender_id']; ?>);

      // Only show messages between the logged-in user and the other user
      if ((message.sender_id == <?php echo $_SESSION['sender_id']; ?> && message.receiver_id == <?php echo $receiver_id ?>) || (message.sender_id == <?php echo $receiver_id; ?> && message.receiver_id == <?php echo $_SESSION['sender_id']; ?>)) {
        const messageClass = message.sender_id == <?php echo $_SESSION['sender_id']; ?> ? 'rright' :'lleft';
        const chatBubble = '<div class="chat-bubble ' + messageClass + '">' + message.message+ '</div>';
        document.getElementById('chat-window').innerHTML += chatBubble;
      }
    }
  })
  .catch(error => {
    console.error(error);
  });
}

// Call the getChatMessages function every second using setInterval
setInterval(getChatMessages, 1000);

</script>


</html>