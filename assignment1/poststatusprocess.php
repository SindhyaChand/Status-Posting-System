<!DOCTYPE html>
<html>
<head>
<title> Search Status Process</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="main">

<h2>Status Process</h2>

<?php

require_once("connect.php"); <!--this file contains the username, pwsrd and host name details-->

<!--selecting and connecting to the database --> 
$connection =@mysqli_connect($hostname, $username, $password, $dbname);
  
// Checks if connection is successful
if (!$connection )
{
// Displays an error message
echo "<p>Database connection failure</p>";
} 
else
{
//To successful connection, Get data from the form
$statusCode = $_POST['statusCode']; //status Code contain user input variables
$status = $_POST['status'];// status contain user input variables
$date = $_POST['date'];//date contain user date input

if(empty($statusCode) ||  empty($status) || empty($date))
{
echo "Please complete your Post form";
}
else if(substr($_POST['statusCode']) == "S")// check if status code starts with capital S
{
echo "<p>Error: Should begins with capital S</p>";
}

else if(strlen($_POST['statusCode'] == 5)
{
echo "The ID is not valid must have a valid length";
}
else if(!preg_match("/[0-9]+/", $_POST['statusCode']))
{
echo "The code should be unique";
}
else
{
//check the post date
$date = $_POST['date'];
		
if($_POST['date'] != date('y-m-d'))
{
//If the data is not the same as date format.
$date = date('y-m-d');
}

// Set up the SQL command to add the data into the table

$queryTable = "insert into $poststatusDB"."(statusID, status, share, date, permission)"
                                    ." values "."('$statusID','$status', '$share', '$date','$permission')";

echo $queryTable;

// executes the query
$result = mysqli_query($connection, $queryTable);

// checks if the execution was successful
if(!$result)
{
echo "<p>Something is wrong", $queryTable,"</p>";
}
else
{
// display an operation successful message
echo "<p>Success: record has been creating.</p>";

} 
}
// close the database connection
mysqli_close($connection);
}  
?>
<br><br><a href="index.html" class="button">Return to Home Page</a>
<br><br><a href="poststatusform.php" class="button">Generate another status</a>

</div>
</body>
</html>
