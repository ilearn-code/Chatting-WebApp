<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/loginform.css">
</head>
<body>


    <div class="loginForm">
        <form  method="post" name="register" action="registerp.php" enctype="multipart/form-data" >
                <h1>Register</h1>
                <input type="text"  name="username" placeholder="Username" required/>
                <br>
                <input type="email"  name="email" placeholder="email" required />
                <br>
                <input type="password" name="password" placeholder="Password" required/>
                <br>
                <input type="password" name="confirm" placeholder="Confirm Password" required/>
                <br>
                <input type="file" name="profile_pic" placeholder="Select profile pic" required>
                <br>
                <input type="submit"  name="submit"/>
                
          </form>
        
        </div>
</body>
</html>