<?php
//This is a help page for people
//sending emails to cell phones
//as text messages.
//20180403 km4ack
//edited 20180531 km4ack

session_start();
//include variables from config.php
include('/var/www/html/config.php');

?>

<!DOCTYPE html>
<html>
<head>
<title>Mobile Email Address</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div>
<h1><?php echo $callsign ?> Emergency Email Server<br>
<div id="pagelabel">Send a Text From Email</div></h1>
<hr><br>
<?php echo "<h2><strong>$time Current Time</strong></h2>"; ?>
</div>
<div>
<strong><h2>See the <a href="allcellproviders.php">full list of providers</a></h2></strong><br><br>
You can send a text message to someone using this system. 
Find the service provider of the person you wish to text on the <a href="allcellproviders.php">full list</a>
page. Replace 10digitphonenumber with the phone number to send 
the text to. So if the person you wish to
text is a Verizon customer and their phone number is 615-555-1234,
 your would send your message to  6155551234@vtext.com
Some cell providers allow replies and some do not. Email is still 
your best bet but text is sometimes quicker.
</div>
<br>
<br>
<div>

<li>Verizon --- 10digitphonenumber@vtext.com</li>

<br>
<br>
</div>
<div>
<br><br>
</div>
<form action="mytext.php">
    <input  type="submit" value="Return to Compose Text"/>
</form>
</body>
</html>

<?php
?>
