<?php

//this page list info for the majority of
//cell providers. it gives the email address
//for each provider so that a text can
//be sent from email.
//gets it's info from allcellproviders.txt file
//20180407 km4ack



$page = $_SERVER['PHP_SELF'];
$sec = "60";

//include variables from config.php
include('/var/www/html/config.php');
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Cell Provider List</title>

</head>

<body>
<div>

<h1><?php echo $callsign ?> Emergency Email Server<br>
<div id="pagelabel">Cell Provider LIST</div>
</h1>
<hr><br>
<?php echo "<h3><Strong>$utc UTC Time</strong></h3>" ?>
<?php echo "<h3><strong>$time Local Time</strong></h3>" ?>
</div>
<form action="mytext.php">
    <input  type="submit" value="Go Back" style="height:35px; width:100px"/>
<br>
<div>
<?php

// echo file_get_contents( "rmslist.txt" ); // get the contents, and echo it out.

$file = fopen("allcellproviders.txt","r");

while(! feof($file))
  {
  echo fgets($file). "<br />";
  }

fclose($file);

?>
<br>
<br>
</div>
<form action="mytext.php">
    <input  type="submit" value="Go Back" style="height:35px; width:100px"/>

