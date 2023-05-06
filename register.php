<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css\registration_form.css">
</head>
<body>


    <div class="loginForm">
        <div class="centered">
        <form  method="post" name="register" action="registerp.php" enctype="multipart/form-data" >
                <h1>Realtime Chat App</h1>
                <input type="text"  name="username" placeholder="Username" />
                <br>
                <input type="email"  name="email" placeholder="email" />
                <br>
                <input type="password" name="password" placeholder="Password" />
                <br>
                <input type="password" name="confirm" placeholder="Confirm Password" />
                <br>
                <input type="file" name="profile_pic" placeholder="Select profile pic" >
                <br>
                <!-- <input type="submit"  name="submit"/> -->
                <button type="submit" name="submit">Continue to chat</button>
                
          </form>
          <span>already signed up?<a href="./login.php">Signed Now</a></span>

        </div>
 
        
        </div>
</body>
</html>