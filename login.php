<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css\login_form.css">
</head>
<body>

<div class="loginForm">
<div class="centered">
<form   name="login">
        <h1>Realtime Chat App</h1>
        <input type="text"  name="username" placeholder="Username" required/>
        <input type="password" name="password" placeholder="Password" required/>
        <button type="submit" name="submit">Continue to chat</button>
  </form>
  <span>Not yet signed up?<a href="./register.php">Signup Now</a></span>
  <span id="errorMessage"></span>
</div>
</div>   

<script src="script/login_user_with_session.js"></script>
</body>
</html>