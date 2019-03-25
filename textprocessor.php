<?php
//20180403 KM4ACK
//edited 20180520

//capture data from mytext.php and convert to email format
//for sending via Pat Winlink

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

//determines is replies are allowed or not
//see config.php to make changes
if ($replies > 0) {
   $callsign1 = $callsign; 
}  else {
    $callsign1 = "NOREPLY";
}


//data from mytext.php
$name = $_POST["name"];
$email = $_POST["email"];
$body = $_POST["body"];
$body = "From ".$name."\r\n\r\n" .$body;
$provider = $_POST["provider"];
$newnumber = $email.$provider;
//add footer to body
$newbody = $body;
//set time variables
$date = gmdate('Y/m/d h:i',time());
//$time = date('Ymd-h:i:s',time());  	//commented out 20180407
//set file name with .b2f extension
$filename = $mid.'.b2f';
//get character count of body
//and add 2 for escape commands
$count =  strlen($newbody);
$count = $count+2;


//write text to the
//temp emails directory

//change directory
chdir("emails");
//open & write file
$file = fopen($filename,"w");						//create the file
fwrite($file,"Mid: ".$mid."\r\n");					//write the MID
fwrite($file,"Body: ".$count."\r\n");					//write the body count
fwrite($file,"Content-Transfer-Encoding: 8bit\r\n");			//write this text (required by wl2k)
fwrite($file,"Content-Type: text/plain; charset=ISO-8859-1\r\n");	//write this text (required by wl2k)
fwrite($file,"Date: ".$date."\r\n");					//write the date
fwrite($file,"From: ".$callsign1."\r\n");					//write callsign
fwrite($file,"Mbo: ".$callsign."\r\n");					//write callsign
fwrite($file,"Subject: ".$textsubject."\r\n");				//write subject of email
fwrite($file,"To: SMTP:".$newnumber."\r\n");				//write the email address for delivery
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
<title>Thanks for your text</title>
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
echo "<h3>You text to ".$email." has been queued for sending.</h3>";
echo "<h3><Strong>".$visitmsg."</h3></strong>";
echo $newnumber;
?>
</div>
<form action="mytext.php">
    <input type="submit" value="Send Another" />


</body>

