<?php include 'auth.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Reporte - Mensual Gastos</title>

<link href="b.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<div id="header">
<center><p>Iglesia Bautista Buenas Nuevas</p></center>

<center><h1>Reporte Mensual de Gastos</h1></center>


<form accept-charset="utf-8"  action="Reporte-Gastos-Mensuales.php"  method="post" name="monthlyexpense">
<p>Fecha: <select id="month" name="month" >

<option value="1">Enero</option>
<option value="2">Febrero</option>
<option value="3">Marzo</option>
<option value="4">Abril</option>
<option value="5">Mayo</option>
<option value="6">Junio</option>
<option value="7">Julio</option>
<option value="8">Agosto</option>
<option value="9">Septiembre</option>
<option value="10">Octubre</option>
<option value="11">Noviembre</option>
<option value="12">Diciembre</option></select>

</select><select id="year" name="year">
<?PHP include 'yearlist.php'; ?>

</select>
<input type="submit" value="Ver Reporte" name="Ver Reporte" /></p>

</form>

</div>
</center>
</body>

</html>
