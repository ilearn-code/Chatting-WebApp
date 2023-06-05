<?php
session_start();
if (!isset($_SESSION["username"])) {

    header("Location: login.php");
    exit();

}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
      <script>
  const senderIdSession = <?php echo $_SESSION['sender_id']; ?>;
</script>
</head>

<body>

    <header class="continer">
        <div class="left">
            <?php
            require "db_conn.php";
            $propfilepic = $_SESSION['username'];
            $q_profile_pic = mysqli_query($conn, "SELECT * FROM user WHERE user='$propfilepic'");
            $row_profile_pic = mysqli_fetch_array($q_profile_pic);
            $img_pathp = $row_profile_pic['img_path'];
            $pp_name = $row_profile_pic['user'];
            echo "<div class=img_n_name>";
            echo "<img src=\"$img_pathp\">";
            echo '<strong id="login_user_name">' . ucfirst($pp_name) . '</strong>';
            echo "</div>";
            ?>



            <a id="logout" href="logout.php">Log out</a>





        </div>
        
        <div class="right" id="right">
        <div class=img_n_name>
         <img id="image_chatting_user" src="" alt="">
         <strong id="chatting_user_name" ></strong>
        
        </div>
        </div>

    </header>
    <div class="c1">
        <div class="l1">
            <div class="search">
                <form class="searchform">
                    <input type="text" placeholder="Search">
                    <button class="search_button"><i class="fa fa-search"></i></button>
                </form>

            </div>
            <div class="listscroll">

      
            </div>


        </div>

        <div class="r1">
                <div id="user-data">

                </div>
            
            <div class="input_message_div">
                <form id="myForm">
                    <input type="text"  id="input_message_id" name="msg" placeholder="Type a message">
                    <input type="hidden" name="receiver_id" id="receiverIdField">
                    <button type="submit" id="input_user_message_button"><i class="uil uil-message">
                           </i></button>
                </form>
            </div>
        


    </div>
  
    <script src="script\list_user_fetch.js"></script>
    <script src="script\select_list_user.js"></script>
    <script src="script\send_chat_data.js"></script>

</body>

<script>








 

</script>

</html>