<?php include 'auth.php'; //Check to make sure user is authenticated 

// Filename: irecord.php
// 
// Receives record ID and pulls information from database
// 
//
// (C)2010 Noel Espinales All Rights Reserved.


?>
<html>
<head>

<style type="text/css">
table { margin: 1em; }
td, th { padding: .3em; border: 1px #ccc solid; } 
body

{
	
 /* Changes on the form */
 background: url(css/style1_bg.gif) #ffffff top repeat-x !important; 
 

  font-family: Verdana, Arial, Helvetica, SunSans-Regular, Sans-Serif;
  color:#564b47;  



}

</style>


</head>


<body>
<table style="width: 100%">
	<tr>
		<td><b>Record</b></td>
		<td><b>Fecha</b></td>
		<td><b>Persona</b></td>
		<td><b>Transaccion</b></td>
		<td><b>Descripcion</b></td>
		<td><b>Check #</b></td>
		<td><b>Cantidad</b></td>
		<td><b>Contado por</b></td>
	</tr>
	
<?PHP

// Grabs Record ID
$record = $_GET['record'];

//Database Connectiong Strings
include  'config.php';
include  'opendb.php';

//SQL Query to grab all records from bbudget_inc that match the record ID
$sql = "SELECT *  FROM `bbudget_inc` WHERE `id` = $record";

$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) 
{

//Display record information


echo "<tr>";

echo "<td>$row[0]</td>";
echo "<td>$row[6]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[3]</td>";
echo "<td>$row[4]</td>";
echo "<td>$".number_format($row[5], 2)."</td>";
echo "<td>$row[7]"." y "."$row[8]</td>";





echo "</tr>";
} 
echo "</table>";
mysql_close($conn);


?>
<center>

<a href="javascript:window.close();">Cerrar</a>
</center>
</body>
</html>
