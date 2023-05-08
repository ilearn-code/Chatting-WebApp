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

    <div class="continer">
        <div class="left">
            <?php
            require "db_conn.php";
            $propfilepic = $_SESSION['username'];
            $q_profile_pic = mysqli_query($conn, "SELECT * FROM user WHERE user='$propfilepic'");
            $row_profile_pic = mysqli_fetch_array($q_profile_pic);
            $img_pathp = $row_profile_pic['img_path'];
            $pp_name = $row_profile_pic['user'];
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
            <div class="listscroll">

                <?php
                require "db_conn.php";

                $query = "SELECT * FROM `user`";
                $run = mysqli_query($conn, $query);


                while ($row = mysqli_fetch_array($run)):
                    if ($_SESSION["username"] != $row['user']) {
                        $img_path = $row['img_path'];
                        ?>
                        <div class="listuser">



                            <button onclick="loadUserData('<?php echo $row['id']; ?>')">

                                <img src="<?php echo $img_path ?>" height="40px" width="40px">
                                <strong id="nn">
                                    <?php echo ucfirst($row['user']); ?>
                                </strong>


                            </button>




                        </div>
                        <?php
                    }


                endwhile; ?>
            </div>


        </div>

        <div class="r1">

            <div class="chat">





                <div id="user-data"></div>














            </div>

            <div class="messagediv">

                <form id="myForm">
                    <input type="text" class="inpmessage" id="inpmessageid" name="msg" ="Type a message">

                    <input type="hidden" name="receiver_id" id="receiverIdField">
                    <button type="submit" id="submitBtn" class="linkk"><i class="uil uil-message"
                            style="color:white; margin-top: 15px;"></i></a>
                </form>



            </div>
        </div>


    </div>


</body>

<script>

let intervalId = null;

function loadUserData(userId) {
  // Set the value of the receiver_id input field in the message form
  receiverIdField.value = userId;

  // Fetch the user data and messages from the server
  fetch('getUserData.php?userId=' + userId)
    .then(response => response.json())
    .then(data => {
      const userDataElement = document.getElementById('user-data');
      let messagesHtml = '';
      data.forEach(message => {
        const sender = message.sender_id == userId ? 'other' : 'self';
        messagesHtml += `<div class="message ${sender}">
          <p>${message.message}</p>
        </div>`;
      });
      userDataElement.innerHTML = messagesHtml;
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
            <p>${message.message}</p>
          </div>`;
        });
        userDataElement.innerHTML = messagesHtml;
      })
      .catch(error => {
        console.error('Error retrieving user data:', error);
      });
  }, 5000); // Update every 5 seconds
}

</script>

<script>

    // Add event listener to the submit button to prevent default form submission and send data using fetch API
    document.getElementById("submitBtn").addEventListener("click", function (event) {
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
        const message = document.getElementById("inpmessageid").value;
        const userDataElement = document.getElementById("user-data");
        const sender = <?php echo $_SESSION['sender_id']; ?>;
        const receiver = document.getElementById("receiverIdField").value;
        const messageHtml = `<div class="message self"><p>${message}</p></div>`;
        // If the chat window is currently showing the conversation between the sender and receiver, add the new message to it
        if (sender == receiver) {
          userDataElement.innerHTML += messageHtml;
        }
      }
    })
    .catch((error) => {
      console.error("Error sending data:", error);
    });
}


</script>

</html >