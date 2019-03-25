<?php
//20180622 km4ack
//video player for
//tutorial videos

//include variables from config.php
include('/var/www/html/config.php');

?>
<!DOCTYPE html>
<html>

<head>
<title>Video Player</title>
<link rel="stylesheet" type="text/css" href="../style.css">

</head>

<body>
<div id="header">

<h1><?php echo $callsign ?> Emergency Email Server<br>
<div id="pagelabel">How to Send a Text Message</div>
</h1>
<hr><br>
<?php echo "<h3><strong>$time Current Time</strong></h3>" ?>
</div>

<div>

 <video width="640" height="480" controls>
  <source src="send-text.mp4" type="video/mp4">
  <source src="send-text.ogg" type="video/ogg">
Your browser does not support the video tag.
</video>

</div>

<br><br>

<form action="../mytext.php">
    <input type="submit" value="Send Text Message" />

<br>
<br>
</body>
</html>
