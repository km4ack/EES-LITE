
<?php
//20180403 km4ack
//this page will list all replies
//that are currently in the system


session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:login.php'); die();
    }


$page = $_SERVER['PHP_SELF'];
$sec = "30";
//include variables from config.php
include('/var/www/html/config.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
<title>Message Replies</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div>
<h1> <?php echo $callsign ?> Emergency Email Server<br>
<div id="pagelabel">Message Replies</div>
</h1>
<hr><br>

<?php
echo '<strong><h3>'.$time.' Current Time<br></strong></h3>';
?>
<div>
<strong>
Message are listed below. The title includes the senders email address or phone number.
<br>
You can use the search function of your browser to search for a reply from a specific address/telephone number.
</strong>
</div>
<br>
<br>
<?php
//display files from /var/www/html/replies
$path = "./replies";
$dh = opendir($path);
$i=1;
while (($file = readdir($dh)) !== false) {
    if($file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin") {
        echo "<a href='$path/$file'>$file</a><br /><br />";
        $i++;
    }
}
closedir($dh);
?>
<br>
</div>
<br><br>
<form action="reply-input.php">
    <input type="submit" value="Input New Reply" />
</form>
</body>
</html>

