<?php
//20180403 km4ack
//last edit 20180622
//This is the main page that a user would see
//and use in order to post an out going email
//to the system. The email will be posted to a temp
//directory where it will be moved by movetopat script 
//to the Pat Winlink Outbox for review and sending.

session_start();
//include variables from config.php
include('/var/www/html/config.php');
?>


<!DOCTYPE html>
<html>
<head>
<title>Compose Email</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
<h1><?php echo $callsign ?>  Emergency Email Server<br>
<div id="pagelabel">Amateur Radio Emergency Services</div>
</h1>
<hr>
<br>
<div>
<?php
if ($replies > 0) {
echo '<form action="search.php">';
echo '<input type="submit" value="Search for Replies" />';
echo '</form><br><br>';
}
?>
<strong>
<font color="red">
Personal emails ONLY! Business emails are illegal on<br>
amateur radio and will be deleted without being sent.</font>
</strong><br><br>
</div>
<div>
<h2>Video Tutorials</h2>
<li><a href="/videos/user-send-email.php">Sending Emails</a></li>
<li><a href="/videos/send-text.php">Sending Text Messages</a></li>
<li><a href="/videos/user-search-replies.php">Searching For Replies</a></li>

</div>

<div class="content">
    <form action="formprocessor.php" method="POST"

        <label>Send Email To: </label><br>
        <input name="email" type="text" size="66" />

        <br>
	<br>

        <label>Subject </label><br>
        <input name="subject" type="text" size="66" />

        <br>
        <br>


        <label>Type Email Below </label><br>
        <TEXTAREA NAME="body" ROWS=10 COLS=75 >
	</TEXTAREA>

        <br>
	<br>

	<label>Your First and Last Name: </label><br>
	<input name="name" type="text" size="66" />

	<br>
	<br>
</div>
        <input name="mySubmit" type="submit" value="Send Email" />

        <br>
<br><br>
    </form>
<form action="mytext.php">
    <input type="submit" value="Send Text Message" />
</form>
<br><br>
</body>
</html>
