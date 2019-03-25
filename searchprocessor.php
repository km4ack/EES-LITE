<?php
//20180403 km4ack
//this page is called by search.php
//and is used to process the date input on 
//the search.php page.
//edited 20180407


//include variables from config.php
include('/var/www/html/config.php');


//verify that something has been entered in the search box
if(empty(trim($_POST['search'])))
{
    // Its empty so throw a validation error
    echo 'Input is empty!'; 
    header('LOCATION:search.php'); die();
}
else
{
    // Input has some text and is not empty.. process accordingly.. 
}


?>
<!DOCTYPE html>
<html>

<head>
<title>Search Results</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div>
<h1><?php echo $callsign ?> Emergency Email Server<br>
<div id="pagelabel">Search For Replies</h1>
<hr><br>


<?php echo "<h3><strong>$time Current Time</strong></h3>" ?>
</div>
<h2>
<?php echo"$message" ?>
</h2><br><br>
<div>
Replies are listed below. If nothing is listed, then no replies have been received.
<br><br>
<?php
$search = $_POST["search"];
$path = "./replies/";
$files = glob($path . "*" . $search . "*". ".php");
$i=1;
foreach($files as $file)
{
  echo "<a href='/$file'>$file</a><br /><br />";
  $i++;
}
?>
</div>
<form action="search.php">
    <input type="submit" value="Search Again" />
</form>

</body>

</html>

