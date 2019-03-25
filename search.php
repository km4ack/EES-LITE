<?php
//this is the page an end user can use
//to search for incoming replies to sent 
//messages. It uses searchprocessor.php to
//process the request.
//20180520 km4ack



//include variables from config.php
include('/var/www/html/config.php');



?>


<!DOCTYPE html>
<html>
<head>
<title>Search Replies</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
<h1><?php echo $callsign ?>  Emergency Email Server<br>
<div id="pagelabel">Search For A Reply</div>
</h1>
<hr>
<br>
<br>
<div>
<br>
<br>
<strong>Enter the email or phone number of the person that you messaged earlier in the box below. If you have received a reply, a list
 will be generated on the next screen.</strong>
<br><br>
</div>
<div class="content">
    <form action="searchprocessor.php" method="POST"

        <label>Email or Phone Number</label><br>
        <input name="search" type="text" size="66" />
        <br>
	<br>
</div>
        <input name="mySubmit" type="submit" value="Search" />

        <br>

    </form>
<br><br>
<form action="email.php">
    <input type="submit" value="Compose Email" />
</form>

</body>
</html>
