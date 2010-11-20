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
$fecha = filter_input(INPUT_POST,"fecha"); 



$total = 0;

$info = explode('-', $fecha);




if ($info[0] == "1") 
{
$mes = "enero";
}
elseif ($info[0] == "2")
{
$mes = "febrero";
}
elseif ($info[0] == "3")
{
$mes = "marzo";
}
elseif ($info[0] == "4" )
{
$mes = "abril";
}
elseif ($info[0]=="5")
{
$mes = "mayo";
}
elseif ($info[0]=="6")
{
$mes = "junio";
}
elseif ($info[0]=="7")
{
$mes = "julio";
}
elseif ($info[0]=="8")
{
$mes ="agosto";
}
elseif ($info[0]=="9")
{
$mes = "septiembre";
}
elseif ($info[0]=="10")
{
$mes = "octubre";
}
elseif ($info[0]=="11")
{
$mes = "noviembre";
}
elseif ($info[0]=="12")
{
$mes = "diciembre";
}

echo "<table>";
echo "<tr>";
echo "<td>";
echo "<center><img src='css/logo.png' alt='Iglesia Buenas Nuevas Logo'  /></center><br /><p><b>Título:</b> <i><u>Reporte Semanal de Ofrendas</u></i></p><p><b>Fecha: </b><i>$info[1] de $mes $info[2]</i></p><p><b>Descripcion: </b><i>Reporte semanal de Ofrendas y Misiones para la semana $info[1] de $mes $info[2].</i>";
echo "</td>";
echo "</tr>";
$sql = "SELECT *  FROM `bbudget_inc` WHERE `transaction` LIKE 'Ingreso - Ofrenda Semanal' AND `date` LIKE '$fecha'";
$result = mysql_query($sql);


 while ($row = mysql_fetch_array($result)) 
{
$total = $total + $row[5];
} 

$sql2 = "SELECT *  FROM `bbudget_inc` WHERE `transaction` LIKE 'Ingreso - Misiones' AND `date` LIKE '$fecha'";
$result2 = mysql_query($sql2);


 while ($row2 = mysql_fetch_array($result2)) 
{
$total2 = $total2 + $row2[5];
} 
mysql_close($conn);
include 'getYearTotal.php';


querySearch("Ingreso - Misiones",$info[1],$info[0],$info[2],"ad");
 

echo $queryTotal;


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
echo "<center><a href='Reporte-Ofrenda-Semanal.php?fecha=$fecha'>Ver detalles</a>";
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
