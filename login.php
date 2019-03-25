<?php

//This page is for login into the system so that
//replies can be posted.
//20180407 km4ack


    session_start();
    echo isset($_SESSION['login']);
    if(isset($_SESSION['login'])) {
      header('LOCATION:index.php'); die();
    }

echo '<h1>KM4ACK Emergency Email Server</h1>';
echo '<h1>Admin Login</h1>';
echo '<hr size="6" width="99%" align="left"color="red">';
$time = date('Ymd--H:i',time());
//echo "<h2><strong>$time Current Time</strong></h2>"

//include variables from config.php
include('/var/www/html/config.php');

?>
<!DOCTYPE html>
<html>
   <head>
     <meta http-equiv='content-type' content='text/html;charset=utf-8' />
     <title>Login</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--This is my stylesheet. Couldn't get it working right. Left for future testing 20180409 km4ack
     <link rel="stylesheet" type="text/css" href="style.css">
-->
    </head>
<body>
  <div class="container">
    
    <?php
      if(isset($_POST['submit'])){
        $username = $_POST['username']; $password = $_POST['password'];
        if($username === $userlogin && $password === $userpasswd){
          $_SESSION['login'] = true; header('LOCATION:reply-input.php'); die();
        } {
          echo "<div class='alert alert-danger'>Username and Password do not match.</div>";
        }

      }
    ?>
    <form action="" method="post">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password" required>
      </div>
      <button type="submit" name="submit" class="btn btn-default">Login</button>
    </form>
  </div>
</body>
</html>
