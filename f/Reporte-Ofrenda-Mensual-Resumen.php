<?php include 'auth.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">




<head><title>Reporte</title>

<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
</head>

<link href="report.css" rel="stylesheet" type="text/css" />

</head>


<body>
<div id="content">
<?PHP

//Database Connection Strings
//##############################
include 'config.php';         //
include 'opendb.php';         //
//##############################

//Capture variables and store them
$month = filter_input(INPUT_POST,"month"); 
$year = filter_input(INPUT_POST, "year");

if ($month==1)
{
	$mes = "Enero";
	
}elseif ($month==2)
{
	$mes = "Febrero";
}elseif ($month==3)
{
	$mes = "Marzo";
}elseif ($month==4)
{
	$mes = "Abril";
}elseif ($month==5)
{
	$mes = "Mayo";
}elseif ($month==6)
{
	$mes = "Junio";
	
}elseif ($month==7)
{
	$mes = "Julio";
}elseif ($month==8)
{
	$mes = "Agosto";
}elseif ($month==9)
{
	$mes = "Septiembre";
}elseif ($month==10)
{
	$mes = "Octubre";
}elseif ($month==11)
{
	$mes = "Noviembre";
}else
{
	$mes = "Diciembre";
}


$newdate = $month."-".$year;

echo "<table>";
echo "<tr>";
echo "<td>";
echo "<center><img src='css/logo.png' alt='Iglesia Buenas Nuevas Logo'  /></center><br /><p><b>Titulo:</b> <i><u>Reporte Mensual de Ofrendas</u></i></p><p><b>Fecha: </b><i>$mes $year</i></p><p><b>Descripcion: </b><i>Reporte mensual de Ofrendas y Misiones para el mes de $mes $year.</i>";
echo "</td>";
echo "</tr>";


// QUERY FOR OFFERING INCOME
$sql = "SELECT *  FROM `bbudget_inc` WHERE `transaction` LIKE 'Ingreso - Ofrenda Semanal' AND `date` LIKE '$month-%-$year'";

// QUERY FOR MISIONES
$sql2 = "SELECT *  FROM `bbudget_inc` WHERE `transaction` LIKE 'Ingreso - Misiones' AND `date` LIKE '$month-%-$year'";

$result = mysql_query($sql);

$result2 = mysql_query($sql2);

 
  
 while ($row = mysql_fetch_array($result)) 
{
$total = $total + $row[5];
}

while ($row2 = mysql_fetch_array($result2)) 
{
$total2 = $total2 + $row2[5];
}

mysql_close($conn);




echo "<tr>";
echo "<td>";
echo "<br />";
echo "<br />";

echo "<div id='results'>";
echo "<p>Total Ofrenda ............ $ ".number_format($total,2)."</p>";
echo "<p>Total Misiones ........... $ ".number_format($total2,2)."</p>";
echo "<p>Total .......................... $ ".number_format($total+$total2,2)."</p>";
echo "</div>";
echo "<br />";

echo "</td>";
echo "<tr>";

echo "<tr>";
echo "<td>";
echo "<center><a href='Reporte-Ofrenda-Mensual.php?month=$month&year=$year'>Ver detalles</a>";
print "<p><a href='Fecha-Ofrenda-Mensual.php'>Reporte Mensual</a> |   <a href='index.php'>Inicio</a></p>";
echo "</center>";
echo "</td>";
echo "</tr>";

echo "</table>";


?>



</div>


</body>
<center>
<?PHP include 'footer.php' ?>
</center>

</html>
