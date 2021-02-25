<?php include 'auth.php'; //Check to make sure user is authenticated ?>
<?PHP

// Filename: getNames.php
// 
// Looks up names and outputs the name to a select field.
// 
//
// (C)2010 noelesp All Rights Reserved.

  
    // Include configuration and open database
	
    include 'config.php';
	include 'opendb.php';
	
	// SQL query to grab person name from person database
	$getName = 	'SELECT `person` FROM `person` ORDER BY `person` ASC';
	
	// Query the database and return any errors
	$resultName = mysql_query($getName) or die(mysql_error());
	
	
	//Grab fields and store them in an array
	while($personName = mysql_fetch_array($resultName)) 
	{
	
	//Output name
	echo "<option>".$personName['person']."</option>";
	}
	//Close the connection 
	mysql_close($conn);
  
  ?>
