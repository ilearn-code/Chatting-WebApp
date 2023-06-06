


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
      <script >
  const senderIdSession = localStorage.getItem('sender_id');
  console.log(senderIdSession);
</script>
</head>

<body>

    <header class="continer">
        <div class="left">
            
          

<div class=img_n_name>
         <img id="login_user_image_id" src="" alt="">
         <strong id="userName" ></strong>
        
        </div>


            <a id="logout">Log out</a>





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
    <script src="script\logout_fetch.js"></script>

</body>

<script>








 

</script>

</html>