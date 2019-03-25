<?php

//This page is used by the ham operator 
//to post email replies into the system
//so that end users can view them.
//Login is required. Password is set in the
//config.php file. This page calls replyprocessor.php
//to process the data entered.
//20180410 km4ack


//session login
session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:login.php'); die();
    }

//include variables from config.php
include('/var/www/html/config.php');


?>


<!DOCTYPE html>
<!--   -->
<html>
<head>
<title>Input Replies</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
<h1><?php echo $callsign ?>  Emergency Email Server<br>
<div id="pagelabel">Post Message Replies</div>
</h1>
<hr>
<br>
<br>
<h1><strong><font color="red"><?php echo $reminder ?></font></strong></h1>

<div class="content">
    <form action="replyprocessor.php" method="POST"

        <label>Who Is the Reply From</label><br>
        <input name="email" type="text" size="66" />

        <br>
	<br>

        <label>What is the Reply?</label><br>
        <TEXTAREA NAME="body" ROWS=10 COLS=75 >
	</TEXTAREA>

	<br>
	<br>
</div>
        <input name="mySubmit" type="submit" value="Post Reply" />

        <br>
	<br>
	<br>
    </form>
<form action="admin.php">
    <input type="submit" value="Control Panel" />
</form>
<br>
<br>
</body>
</html>
