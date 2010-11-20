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


$year = filter_input(INPUT_POST, "year");



echo "<center>";
echo "<p>Iglesia Bautista Buenas Nuevas </p>";
echo "<h1>Reporte Anual de Gastos</h1>";
echo "<h2>$year</h2>";




echo "</center>";
?>

<fieldset><legend>Reporte Anual por Mes</legend>

<br/><br/>




<?PHP
include 'getYearTotal.php';


$Month = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$x =  0 ;


echo "<center>";
echo "<table >";
echo "<tr><th>Mes</th>";
echo "<th>Ofrenda Total</th></tr>";

for ($counter = 0; $counter <=11; $counter +=1)

{
$x = $x + 1;
echo "<tr><td>";
echo $Month[$counter];
echo "</td><td>";
echo "$ ".number_format(yearExpenseTotal($x,$year), 2);
echo "</td></tr>";

$sumTotal = $sumTotal + yearExpenseTotal($x, $year);


}

echo "</table>";


echo "<center><h2><blockquote>Total Gastos: $<b>".number_format($sumTotal,2)."</b></blockquote></h2></center>";

print "<p><a href='Gastos-Anuales.php'>Reporte Anual de Gastos</a> |   <a href='index.php'>Inicio</a></p>";
echo "</center>";
?>





</fieldset>

</body>
<center>
<?PHP include 'footer.php' ?>
</center>
</html>
