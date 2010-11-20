<?php include 'auth.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">




<head><title>Reporte Ofrenda Semanal</title>

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
$fecha =  $_GET['fecha'];

$total = 0;

$info = explode('-', $fecha);




if ($info[0] == "1") 
{
$mes = "enero";
}
elseif ($info[0] == "2")
{

$mes = "febrero";

}elseif ($info[0] == "3")
{
$mes = "marzo";
}elseif ($info[0] == "4" )
{

$mes = "abril";

}elseif ($info[0]=="5")
{
$mes = "mayo";
}elseif ($info[0]=="6")
{
$mes = "junio";
}elseif ($info[0]=="7")
{
$mes = "julio";
}elseif ($info[0]=="8")
{
$mes ="agosto";
}elseif ($info[0]=="9")
{
$mes = "septiembre";
}elseif ($info[0]=="10")
{
$mes = "octubre";
}elseif ($info[0]=="11")
{
$mes = "noviembre";
}
elseif ($info[0]=="12")
{
$mes = "diciembre";
}
echo "<center>";
echo "<p>Iglesia Bautista Buenas Nuevas </p>";
echo "<h1>Reporte Semanal de Ofrendas</h1>";
echo "<h3>Semana $info[1] de $mes $info[2]</h3>";



echo "</center>";
?>

<fieldset><legend>Reporte Semanal</legend>

<table style="width: 100%">
	<tr>
		<td><b>Record</b></td>
		<td><b>Fecha</b></td>
		<td><b>Persona</b></td>
		<td><b>Check #</b></td>
		<td><b>Cantidad</b></td>
		<td><b>Contado por</b></td>
	</tr>

<?PHP

$sql = "SELECT *  FROM `bbudget_inc` WHERE `transaction` LIKE 'Ingreso - Ofrenda Semanal' AND `date` LIKE '$fecha'";

 $result = mysql_query($sql);
 
  echo "<p></p>";
 while ($row = mysql_fetch_array($result)) 
{

$total = $total + $row[5];

echo "<tr>";

echo "<td><a href='irecord.php?record=$row[0]' target='_blank'>$row[0]</a></td>";
echo "<td>$row[6]</td>";
echo "<td>$row[2]</td>";
echo "<td>$row[4]</td>";
echo "<td>$".number_format($row[5], 2)."</td>";
echo "<td>$row[7]"." y "."$row[8]</td>";

echo "</tr>";
} 
echo "</table>";

mysql_close($conn);


echo "<center><h2><blockquote>Total Ofrenda: $<b>".number_format($total,2)."</b></blockquote></h2></center>";

include 'getYearTotal.php';


echo "<p>Ofrendas hasta la fecha: <b>$".number_format(YTDIncomeTotal(),2)."</b></p>";

echo "<center>";
echo "<p><a href='javascript:history.go(-1)'>Regresar</a> | <a href='Fecha-Ofrenda-Semanal.php'>Reporte Semanal</a> |   <a href='index.php'>Inicio</a></p>";
echo "</center>";
?>

</fieldset>

</body>

<center>
<?PHP include 'footer.php' ?>
</center>

</html>
