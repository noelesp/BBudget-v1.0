<?php include 'auth.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">




<head><title>Reporte</title>

<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
</head>

<link href="b.css" rel="stylesheet" type="text/css" />

</head>


<body>

<?PHP

//Database Connection Strings
//##############################
include 'config.php';         //
include 'opendb.php';         //
//##############################

//Capture variables and store them

//$queryString = filter_input(INPUT_POST, "string");
//$queryType = filter_input(INPUT_POST, "query");
//$database = filter_input(INPUT_POST, "database");
//$year = filter_input(INPUT_POST, "year");

$queryString= $_GET['string'];
$queryType= $_GET['query'];
$database= $_GET['database'];

$year= $_GET['year'];






echo "<center>";
echo "<p>Iglesia Bautista Buenas Nuevas </p>";
echo "<h3>Resultados de $queryString</h3>";




echo "</center>";
?>

<fieldset><legend>Reporte Detallado</legend>

<br/><br/>


<table style="width: 100%">
	<tr>
		<td><b>Record</b></td>
		<td><b>Fecha</b></td>
		<td><b>Persona</b></td>
		<td><b>Transaccion</b></td>
		<td><b>Check #</b></td>
		<td><b>Descripcion</b></td>
		<td><b>Cantidad</b></td>
	</tr>
	


<?PHP

if ($queryType == "Record" )
{

$sql = "SELECT *  FROM $database WHERE `id` LIKE '$queryString' AND `date` LIKE '%-%-$year'";

}elseif ($queryType == "Persona")

{
$sql = "SELECT *  FROM $database WHERE `person` LIKE '$queryString%' AND `date` LIKE '%-%-$year'";

}elseif ($queryType == "Cheque")
{

$sql = "SELECT * FROM $database WHERE `check` LIKE '$queryString%' AND `date` LIKE '%-%-$year'";


}elseif ($queryType == "Fecha (DD-MM-AAAA)")
{

$sql = "SELECT * FROM $database WHERE `date` LIKE '$queryString'";
}elseif ($queryType == "Cantidad")
{
$sql = "SELECT * FROM $database WHERE `amount` ='$queryString' AND `date` LIKE '%-%-$year'";

}elseif ($queryType== "Transaccion")
{

$sql = "SELECT * FROM $database WHERE `transaction` LIKE '$queryString%' AND `date` LIKE '%-%-$year'";


}


$result = mysql_query($sql);
 

 
 echo "<p></p>";
 
 while ($row = mysql_fetch_array($result)) 
{

$total = $total + $row[5];


if ($database == "bbudget_inc") 
{
echo "<td><a href='irecord.php?record=$row[0]' target='_blank'>$row[0]</a></td>";
}
elseif ($database =="bbudget_ex")
{
echo "<td><a href='erecord.php?record=$row[0]' target='_blank'>$row[0]</a></td>";
}

echo "<td>$row[6]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[4]</td>";

echo "<td>$row[3]</td>";
echo "<td>$".number_format($row[5], 2)."</td>";


echo "</tr>";



} 
echo "</table>";
mysql_close($conn);

echo "<center><h2><blockquote>Total: $<b>".number_format($total,2)."</b></blockquote></h2></center>";

echo "<center>";
print "<p><a href='query.php'>Buscar Record</a> |   <a href='index.php'>Inicio</a></p>";
echo "</center>";
?>

</fieldset>

</body>

</html>
