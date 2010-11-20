<?php include 'auth.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Reporte - Anual</title>

<link href="b.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<div id="header">
<center><p>Iglesia Bautista Buenas Nuevas</p></center>

<center><h1>Reporte Anual de Gastos</h1></center>


<form accept-charset="utf-8"  action="Reporte-Gastos-Anuales.php"  method="post" name="expReport">
<p>Fecha: <select id="year" name="year">
<?PHP include 'yearlist.php'; ?>

</select>
<input type="submit" value="Ver Reporte" name="Ver Reporte" /></p>

</form>

</div>
</center>
</body>

</html>
