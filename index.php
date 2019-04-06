<?php
//20190406 km4ack
//This is a splash page for the 
//EES system.
//You can change the welcome messge of this 
//page by editing the splash.txt file found
//in /var/www/html

session_start();
//include variables from config.php
include('/var/www/html/config.php');
?>


<!DOCTYPE html>
<html>
<head>
<title>EES Splash Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
<h1><?php echo $callsign ?>  Emergency Email Server<br>
<div id="pagelabel">Amateur Radio Emergency Services</div>
</h1>
<hr>
<br>
<strong>
<div>
<h2>
<?php
//display contect of splash.txt file
$fh = fopen('splash.txt','r');
while ($line = fgets($fh)) {
  echo($line);
}
fclose($fh);
?>
</h2>
</div>
</strong><br><br>
</div>
<div>
<h3>
<?php
if ($replies = 0) {
echo 'You may send an email or text using the link below ';
echo 'but the system is not configured to accept replies. ';
echo 'Only outgoing messages will be delivered. ';
echo 'Thank you for your understanding with this limitation';
}
?>
</h3>
</div>

<br>
<form action="email.php">
    <input type="submit" value="Send Email" />
</form>
<br><br>
<form action="reply-input.php">
    <input type="submit" value="Operator Login" />
</form>
</body>
</html>
