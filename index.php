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

                <?php
                require "db_conn.php";

                $query = "SELECT * FROM `user`";
                $run = mysqli_query($conn, $query);


                while ($row = mysqli_fetch_array($run)):
                    if ($_SESSION["username"] != $row['user']) {
                        $img_path = $row['img_path'];
                        ?>
                       



                            <a onclick="loadUserData('<?php echo $row['id']; ?>','<?php echo ucfirst($row['user']); ?>','<?php echo $img_path ?>')">

                            <div class="listuser">

                                <img src="<?php echo $img_path ?>" >
                                <strong id="nn">
                                    <?php echo ucfirst($row['user']); ?>
                                </strong>
                                </div>
                    </a>




                        
                        <?php
                    }


                endwhile; ?>
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


</body>

<script>






    let intervalId = null;

    function loadUserData(userId,selectedUserNAme,imageSrc) {
        // Set the value of the receiver_id input field in the message form
        receiverIdField.value = userId;
        const image_chatting_user=document.getElementById('image_chatting_user');
        image_chatting_user.style.display="block";
        const chatting_user_name=document.getElementById('chatting_user_name');

        image_chatting_user.setAttribute('src',imageSrc);
        chatting_user_name.innerHTML = selectedUserNAme;

    
    
 
        fetch('getUserData.php?userId=' + userId)
            .then(response => response.json())
            .then(data => {
                const userDataElement = document.getElementById('user-data');
                let messagesHtml = '';
                data.forEach(message => {
                    const sender = message.sender_id == userId ? 'other' : 'self';
                    messagesHtml += `<div class="message ${sender}">
          <span id="message_${sender}_para">${message.message}</span>
        </div>`;
                });
                userDataElement.innerHTML = messagesHtml;
                userDataElement.scrollTop = userDataElement.scrollHeight;
            })
            .catch(error => {
                console.error('Error retrieving user data:', error);
            });

        // Clear the interval before setting a new one
        if (intervalId) {
            clearInterval(intervalId);
        }

        // Update the chat window periodically
        intervalId = setInterval(() => {
            fetch('getUserData.php?userId=' + userId)
                .then(response => response.json())
                .then(data => {
                    const userDataElement = document.getElementById('user-data');
                    let messagesHtml = '';
                    data.forEach(message => {
                        const sender = message.sender_id == userId ? 'other' : 'self';
                        messagesHtml += `<div class="message ${sender}">
                        <span id="message_${sender}_para">${message.message}</span>
          </div>`;
                    });
                    userDataElement.innerHTML = messagesHtml;
                })
                .catch(error => {
                    console.error('Error retrieving user data:', error);
                });
        }, 1000); // Update every 1 seconds
    }



    // Add event listener to the submit button to prevent default form submission and send data using fetch API
    document.getElementById("input_user_message_button").addEventListener("click", function (event) {
        event.preventDefault();
        sendData();
       
  
    });

    function sendData() {
        const form = document.getElementById("myForm");
        const formData = new FormData(form);
        fetch("inputmsg.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => {
                console.log(response);
                // If the message was successfully sent to the server, add it to the chat window
                if (response.ok) {
                    const message = document.getElementById("input_message_id").value;
                    const userDataElement = document.getElementById("user-data");
                    
                    const sender = <?php echo $_SESSION['sender_id']; ?>;
                    const receiver = document.getElementById("receiverIdField").value;
                    const messageHtml = `<div class="message self"><p>${message}</p></div>`;
                    // If the chat window is currently showing the conversation between the sender and receiver, add the new message to it
                    if (sender == receiver) {
                        userDataElement.innerHTML += messageHtml;
                        
                    }
                    document.getElementById('input_message_id').value = "";
                    userDataElement.scrollTop = userDataElement.scrollHeight;
                }
            })
            .catch((error) => {
                console.error("Error sending data:", error);
            });
    }


</script>

</html>