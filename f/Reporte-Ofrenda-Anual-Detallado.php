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

$year = filter_input(INPUT_POST, "year");



echo "<center>";
echo "<p>Iglesia Bautista Buenas Nuevas </p>";
echo "<h1>Report Anual de Ofrendas</h1>";
echo "<h2>$year</h2>";




echo "</center>";
?>

<fieldset><legend>Reporte Anual Detallado</legend>

<br/><br/>


<table style="width: 100%">
	<tr>
		<td><b>Record</b></td>
		<td><b>Fecha</b></td>
		<td><b>Persona</b></td>
		<td><b>Transaccion</b></td>
		<td><b>Check #</b></td>
		<td><b>Cantidad</b></td>
		<td><b>Contado por</b></td>
	</tr>
	


<?PHP

$sql = "SELECT *  FROM `bbudget_inc` WHERE `transaction` LIKE 'Ingreso - Ofrenda Semanal' AND `date` LIKE '%-%-$year'";

 $result = mysql_query($sql);
 
 echo "Fecha: ".$year;
 
 echo "<p></p>";
 
 while ($row = mysql_fetch_array($result)) 
{

$total = $total + $row[5];


echo "<td><a href='irecord.php?record=$row[0]' target='_blank'>$row[0]</a></td>";
echo "<td>$row[6]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[1]</td>";
echo "<td>$row[4]</td>";
echo "<td>$".number_format($row[5], 2)."</td>";
echo "<td>$row[7]"." y "."$row[8]</td>";



echo "</tr>";



} 
echo "</table>";
mysql_close($conn);

echo "<center><h2><blockquote>Ingresos Totales: $<b>".number_format($total,2)."</b></blockquote></h2></center>";

include 'getYearTotal.php';

echo "<p>Ofrendas hasta la fecha: <b>$".number_format(YTDIncomeTotal(),2)."</b></p>";

echo "<center>";
print "<p><a href='Ofrenda-Anual-Detallado.php'>Reporte Anual</a> |   <a href='index.php'>Inicio</a></p>";
echo "</center>";
?>





</fieldset>

</body>

</html>
