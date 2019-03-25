
<?php
//20180510 km4ack
//This is the page that a user would see
//and use in order to post an out going text message
//to the system. The text will be posted to the 
//Pat Winlink Outbox for review and sending
//This page calls textprocessor.php to format the data
//into an outgoing email. 

session_start();
//include variables from config.php
include('/var/www/html/config.php');

?>


<!DOCTYPE html>
<html>
<head>
<title>Compose Text</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
<h1><?php echo $callsign ?>  Emergency Email Server<br>
<div id="pagelabel">Amateur Radio Emergency Services</div>
</h1>

<hr><br>
<strong>
<font color="red">
<div>You <u>MUST</u> know the mobile service provider for the person you are trying to text for your message to be delivered.
<br>If you are not CERTAIN of the provider, we recommend you <a href="email.php">send an email instead</a>
</font>
<br><br>
</div>
<div class="content">
    <form action="textprocessor.php" method="POST"

        <label>Phone Number to Text:</a></label><br>
        <input name="email" type="text" size="66" value=""/>

        <br>
	<br>

If the provider isn't listed in the dropdown menu below,<br> select other and <a href="celladdy.php">read this page for help</a><br>
<br>
Who is your friend's mobile service provider?<br>
<select name="provider">
  <option value="">Select...</option>
  <option value="@txt.att.net">AT&T</option>
  <option value="@myboostmobile.com">Boost</option>
  <option value="@mymetropcs.com">Metro PCS</option>
  <option value="@messaging.sprintpcs.com">Sprint</option>
  <option value="@tmomail.net">Tmobile</option>
  <option value="@txt.att.net">Tracfone</option>
  <option value="@vtext.com">Verizon</option>
  <option value="@vmobl.com">Virgin Mobile</option>
  <option value="">Other</option>

</select>

	<br>
	<br>
        <label>Type Text Below-Limit 90 charaters! </label><br>
        <TEXTAREA NAME="body" ROWS=5 COLS=75 maxlength="90" >
	</TEXTAREA>

        <br>
	<br>

	<label>Your First and Last Name: </label><br>
	<input name="name" type="text" size="66" />

	<br>
	<br>
</div>
        <input name="mySubmit" type="submit" value="Send Text" />

        <br>

    </form>
<br><br>
</body>
</html>
