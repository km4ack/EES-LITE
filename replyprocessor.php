<?php
//20180520 KM4ACK
//edited 20180520

//post replies to /var/www/html/replies folder
//this form is called by reply-input.php

//session_start();
//include variables from config.php
include('/var/www/html/config.php');


//data from reply-input.php
$email = $_POST["email"];
$body = $_POST["body"];

//set time variables
$date = gmdate('Y/m/d h:i',time());
$time = date('Ymd-h:i:s',time());
//set file name with .php extension
$filename = $time.'-'.$email.'.php';
//used for writing " marks in fwrite
$quote = '"';


//write text to the
//replies folder

//change directory
chdir("replies");
//open & write file
$file = fopen($filename,"w");									//create the file
fwrite($file,"<head><title>Reply</title><link rel=".$quote."stylesheet".$quote." type=".$quote."text/css".$quote."href=".$quote."/style.css".$quote."></head>");
fwrite($file,"<body><h1><?php echo $callsign ?>  Emergency Email Server<br>Amateur Radio Emergency Services</h1><br><hr><br><br>"); 
fwrite($file,"<strong>Message Posted at UTC Date and time ".$date."</strong><br><br><br>");		//write the date
fwrite($file,"\r\n");										//returns a blank line
//fwrite($file,"<br><br><a href=".$quote."/search.php".$quote.">New Search</a><br>");		//button for new search
fwrite($file,"<form action=".$quote."/search.php".$quote.">");					//search again button
fwrite($file,"<input type=".$quote."submit".$quote." value=".$quote."Search Again".$quote." /></form>"); //search again button
//fwrite($file,"<br>");                                                   			//returns a blank line
//fwrite($file,"<br>");                                                   			//returns a blank line
//fwrite($file,"<br>");                                                   			//returns a blank line
fwrite($file,"<h3><strong>Below is the reply to the  message you sent to ".$email."</strong></h3>");   //prints instructions
fwrite($file,"<br>");                                                                           //returns a blank line
fwrite($file,"==========Begin Message===========");						//begin message indicator
fwrite($file,"<br>");                                                                           //returns a blank line
fwrite($file,"<br>");                                                   			//returns a blank line
fwrite($file,$body."<br>");									//write the body of the message
fwrite($file,"<br>");                                                                           //returns a blank line
fwrite($file,"==========End Message============<br><br>");						//end message indicator
fwrite($file,"<form action=".$quote."/search.php".$quote.">");                                   //search again button
fwrite($file,"<input type=".$quote."submit".$quote." value=".$quote."Search Again".$quote." /></form>"); //search again button
//fwrite($file,"<br><br><a href=".$quote."/search.php".$quote.">New Search</a><br>");		//button for new search
fclose($file);											//close the file


//echo any errors
print_r(error_get_last());


?>


<!DOCTYPE html>
<html>

<head>
<title>Reply Input</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div>
<h1><?php echo $callsign ?> Emergency Email Server<br>
<div id="pagelabel">Post Message Replies</h1>
<hr><br>


<?php echo "<h3><strong>$time Current Time</strong></h3>" ?>
</div>
<div>
<?php
//echo "<br>";
//echo "<h3>The reply from ".$name."<br></h3>";
echo "<h3>The reply from ".$email." has been posted.</h3>";
//echo "<h3><Strong>".$visitmsg."</h3></strong>";
//echo $newnumber;
?>
</div>
<form action="reply-input.php">
    <input type="submit" value="Post Another Reply" />


</body>

