<!DOCTYPE>	
<html>
<head>
<title> Search Status Process</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div id="main">
<h2>Status Information</h2>

<!--php starts-->
<?php
 
require_once("connect.php"); <!--this file contains the username, pwsrd and host name details-->

<!--mysqli_connect return false when connection is failed --> 
$connection = @mysqli_connect($hostname, $username, $password, $dbname);

//Checking if connection is successful
if(!$connection)
{
echo "<p>"Connection faliure so, unable to connect:</p>";
}
else
{
//Connection successful, get the data from the search form 
$searchstatus = $_GET["searchStatus"];

<--setting up a sql command to retrieve data from the table-->
$querysearch = "SELECT * FROM poststatusDB WHERE status LIKE '%$searchstatus%'";

//executing the query and storing result
$searchResult = mysqli_query($connection, $querysearch);

//checking if execution was successful
if(!$result)
{
echo "<p>Error: Something gone wrong ",	$query, "</p>";
}
else{
if(mysqli_num_rows($result)!= 0)
{
//Display the retrieve information

echo "<table border=\"1\">";
	echo "<tr>\n" ."<th scope=\"col\">Status:</th>\n"
		      ."<th scope=\"col\">Status Code:</th>\n"
		      ."<th scope=\"col\">Share</th>\n"
		      ."<th scope=\"col\">Date</th>\n"
                      ."<th scope=\"col\">Permission:</th>\n" 
                      ."</tr>\n";

//This function collects all the information we want, (mysqli_fetch_array) collects all rose data and puts it into array and it links to the querysearch

while($row = @mysqli_fetch_array($searchResult))
{
 echo "<p>Status: ".$row['Status']."<br/>";
 echo "Status Code: ". $row['Status_Code'] . "</p>";
 echo "<p>Share: ". $row['Share'] ."<br/>";
 echo "<p>Date Posted: ". $row['Date'] . "<br/>";
 echo "<p>Permission: ". $row['Permission_Type'] . "</p>";

echo"<br/>";
echo:<br/>";
}

//Frees up the memory, after using the result
mysqli_free_result($searchResult);
}

//Close the database connection
mysqli_close($connection);
}

?>
<p>
<span class="alignleft"<a href="searchstatusform.html">Search for another staus</a></span>
<span class="alignright"<a href="index.html">Return to Home Page</a></span></p>

</div>
</body>
</html>