<?php
//20180403 KM4ACK
//edited 20190324

//This page is called by index.php
//It processes the info submitted through index.php
//and formats it as an outgoing email. It is placed
//in the /var/www/html/emails dirctory. The movetopat script
//is ran as a cron job and moves emails to the pat outgoing
//box so they can be fowarded via RF.

//session_start();
//include variables from config.php
include('/var/www/html/config.php');

//generate random file name
function generateRandomString($length = 10) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//set length of random generated numbers
//for the MID number
$mid = generateRandomString(12);

//determines if replies are allowed.
//set this in config.php
if ($replies > 0) {
   $callsign1 = $callsign; 
}  else {
    $callsign1 = "NOREPLY";
}

//determines footer to be used 
//based on replies allowed or not
if ($replies > 0) {
   $footer = $footer;
}  else {
   $footer = $footer1;
}

//data from index.php
$name = $_POST["name"];
$email = $_POST["email"];
$body = $_POST["body"];
$subject = "MSG from ".$name." ".$_POST["subject"];
$body = "This message is from ".$name."\r\n\r\n Begin Message \r\n=================================\r\n".$body."\r\n=================================\r\n End Message";
//add footer to body
$newbody = $body."\r\n"."\r\n".$footer;
//set time variables
$date = gmdate('Y/m/d h:i',time());
//$time = date('Ymd-h:i:s',time());  	//commented out 20180407
//set file name with .b2f extension
$filename = $mid.'.b2f';
//get character count of body
//and add 2 for escape commands
$count =  strlen($newbody);
$count = $count+2;


//write email to the
//pat outbox

//change directory
chdir("emails");
//open & write file
$file = fopen($filename,"w");						//create the file
fwrite($file,"Mid: ".$mid."\r\n");					//write the MID
fwrite($file,"Body: ".$count."\r\n");					//write the body count
fwrite($file,"Content-Transfer-Encoding: 8bit\r\n");			//write this text (required by wl2k)
fwrite($file,"Content-Type: text/plain; charset=ISO-8859-1\r\n");	//write this text (required by wl2k)
fwrite($file,"Date: ".$date."\r\n");					//write the date
fwrite($file,"From: ".$callsign1."\r\n");				//write callsign 
fwrite($file,"Mbo: ".$callsign."\r\n");					//write MBO with operator callsign
fwrite($file,"Subject: ".$subject."\r\n");				//write subject of email
fwrite($file,"To: SMTP:".$email."\r\n");				//write the email address for delivery
fwrite($file,"Type: Private\r\n");					//set message type to private
fwrite($file,"\r\n");							//returns a blank line
fwrite($file,$newbody."\r\n");						//write the body of the message
fclose($file);								//close the file

//echo any errors
print_r(error_get_last());


?>


<!DOCTYPE html>
<html>

<head>
<title>Message Queued</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div>
<h1><?php echo $callsign ?> Emergency Email Server<br>
<div id="pagelabel">Message Queued</h1>
<hr><br>


<?php echo "<h3><strong>$time Current Time</strong></h3>" ?>
</div>
<div>
<?php
//echo "<br>";
echo "<h3>Thank you ".$name."<br></h3>";
echo "<h3>You message to ".$email." has been queued for sending.</h3>";
echo "<h3><Strong>".$visitmsg."</h3></strong>";
?>
</div>
<form action="email.php">
    <input type="submit" value="Send Another" />


</body>

