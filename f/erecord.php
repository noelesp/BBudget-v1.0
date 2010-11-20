<?php include 'auth.php'; ?>
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
		<td><b>Agregado por</b></td>
	</tr>
	
<?PHP

$record = $_GET['record'];

include  'config.php';
include  'opendb.php';


$sql = "SELECT *  FROM `bbudget_ex` WHERE `id` = $record";

$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) 
{




echo "<tr>";

echo "<td>$row[0]</td>";
echo "<td>$row[6]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[3]</td>";
echo "<td>$row[4]</td>";
echo "<td>$".number_format($row[5], 2)."</td>";
echo "<td>$row[7]</td>";





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
