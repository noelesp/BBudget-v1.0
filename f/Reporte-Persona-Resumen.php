<?php include 'auth.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">




<head><title>Reporte Ofrenda Semanal</title>

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
$year = filter_input(INPUT_POST,"year"); 
$person = filter_input(INPUT_POST,"person");




$total = 0;



echo "<table>";
echo "<tr>";
echo "<td>";
echo "<center><img src='css/logo.png' alt='Iglesia Buenas Nuevas Logo'  /></center><br /><p><b>Titulo:</b> <i><u>Reporte Personal - $person</u></i></p><p><b>Fecha: </b><i>$year</i></p><p><b>Descripcion: </b><i>Reporte Personal de Ofrendas y Misiones de $person</i>";
echo "</td>";
echo "</tr>";
$sql = "SELECT *  FROM `bbudget_inc` WHERE `transaction` LIKE 'Ingreso - Ofrenda Semanal' AND `person` LIKE '$person' AND `date` LIKE '%-%-$year'";
$result = mysql_query($sql);


 while ($row = mysql_fetch_array($result)) 
{
$total = $total + $row[5];
} 

$sql2 = "SELECT *  FROM `bbudget_inc` WHERE `transaction` LIKE 'Ingreso - Misiones' AND `person` LIKE '$person' AND `date` LIKE '%-%-$year'";
$result2 = mysql_query($sql2);


 while ($row2 = mysql_fetch_array($result2)) 
{
$total2 = $total2 + $row2[5];
} 



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
echo "<center><a href='queryResult.php?database=bbudget_inc&year=$year&query=Persona&string=$person&Buscar=Buscar'>Ver detalles</a>";
echo "<br />";
echo "<br />";
echo "<br />";
echo "<p><a href='Fecha-Ofrenda-Semanal.php'>Reporte Semanal</a> |   <a href='index.php'>Inicio</a></p>";
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
