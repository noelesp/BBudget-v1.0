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


//Capture variables and store them

$year = filter_input(INPUT_POST, "year");



echo "<center>";
echo "<p>Iglesia Bautista Buenas Nuevas </p>";
echo "<h1>Reporte Anual Gastos y Ofrendas</h1>";
echo "<h2>$year</h2>";




echo "</center>";
?>

<fieldset><legend>Reporte Anual por Mes</legend>

<br/><br/>




<?PHP
include 'getYearTotal.php';


$Month = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$x =  0 ;

$prevYear = $year - 1;
echo "<center>";
echo "<table >";
echo "<tr><th>Mes</th>";
echo "<th>Ofrendas </th>";
echo "<th>Gastos </th>";
echo "<th>$prevYear Ofrenda</th>";
echo "<th>$prevYear Gastos</th>";
echo "</tr>";


for ($counter = 0; $counter <=11; $counter +=1)

{
$x = $x + 1;
echo "<tr><td>";
echo $Month[$counter];
echo "</td><td>";
echo "$ ".number_format(yearIncomeTotal($x,$year), 2);
// Current Fiscal Year Income Total

$fiscalYearIncome = $fiscalYearIncome + yearIncomeTotal($x, $year);

echo "</td>";
echo "<td>";
echo "$ ".number_format(yearExpenseTotal($x,$year), 2);
// Current Fiscal Year Expense Total

$fiscalYearExpense = $fiscalYearExpense + yearExpenseTotal($x, $year);

echo "</td>";
echo "<td>";
echo "$ ".number_format(yearIncomeTotal($x,$prevYear), 2);
//Previous Fiscal Year Income Total

$prevFYIncome = $prevFYIncome + yearIncomeTotal($x, $prevYear);


echo "</td>";
echo "<td>";
echo "$ ".number_format(yearExpenseTotal($x, $prevYear), 2);

//Previous Fiscal Year Expense Total
$prevFYExpense = $prevFYExpense + yearExpenseTotal($x, $prevYear);

echo "</td>";
echo "</tr>";

}

echo "</table>";

$balance = $fiscalYearIncome - $fiscalYearExpense;

$prevBalance = $prevFYIncome - $prevFYExpense;

echo "<center><h3><blockquote>Total Ingresos: $<b>".number_format($fiscalYearIncome,2)."</b></blockquote></h2></center>";
//echo "$prevYear Total Ingresos: $".number_format($prevFYIncome,2);
echo "<center><h3><blockquote>Total Gastos: $<b>".number_format($fiscalYearExpense,2)."</b></blockquote></h2></center>";
//echo "$prevYear Total Gastos: $".number_format($prevFYExpense,2);
echo "<center><h2><blockquote>Balance: $<b>".number_format($balance,2)."</b></blockquote></h1></center>";
echo "<p>$prevYear Balance: $".number_format($prevBalance, 2)."</p>";
echo "<br />";
print "<p><a href='Anual-Gastos-Ofrendas.php'>Reporte Anual Gastos y Ofrendas</a> |   <a href='index.php'>Inicio</a></p>";
echo "</center>";
?>



</fieldset>

</body>
<center>
<?PHP include 'footer.php' ?>
</center>

</html>
