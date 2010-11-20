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
?>


<center>

<table style="width: 50%">

<tr><td colspan="3"><center><img src="css/logo.png" alt="Iglesia Buenas Nuevas Logo"  /></center></td></tr>


<?PHP
include 'getYearTotal.php';


$Month = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$x =  0 ;
$sumTotal = 0;

echo "<center>";

echo "<tr><td>Mes</td>";
echo "<td>Ofrenda Total</td>";
//echo "<td>Linea</td></tr>";

for ($counter = 0; $counter <=11; $counter +=1)

{
$x = $x + 1;
echo "<tr><td>";
echo $Month[$counter];
echo "</td><td>";
echo "$ ".number_format(yearIncomeTotal($x,$year), 2);
echo "</td>";


$sumTotal = $sumTotal + yearIncomeTotal($x, $year);


}

//echo "<td rowspan='12'>";
//echo "<img src='http://chart.apis.google.com/chart?chs=250x100&amp;chd=t:50,40,10&amp;chco=00FF00|FF0000|0000F4&amp;cht=p3&amp;chl=Ingresos|Gastos|Misiones' >";
//echo "</td>";
//echo "</tr>";




echo "</table>";

echo "<center><h2><blockquote>Total Ofrenda: $<b>".number_format($sumTotal,2)."</b></blockquote></h2></center>";
print "<p><a href='Ofrenda-Anual.php'>Reporte Anual</a> |   <a href='index.php'>Inicio</a></p>";
echo "</center>";
?>






</center>
</body>
<center>
<?PHP include 'footer.php' ?>
</center>

</html>
