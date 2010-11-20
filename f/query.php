<?php include 'auth.php'; ?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Buscar Records</title>

<link href="b.css" rel="stylesheet" type="text/css" />
</head>

<body>

<center>

<div id="header">
<center><p>Iglesia Bautista Buenas Nuevas</p></center>

<center><h1>Buscar Records</h1></center>


<form accept-charset="utf-8"  action="queryResult.php"  method="GET" name="queryReport">

<p>Buscar en: <select id="database" name="database">
<option value="bbudget_inc">Ingresos</option>
<option value="bbudget_ex">Gastos</option>
</select>
Fecha: <select id="year" name="year">
<?PHP include 'yearlist.php'; ?>
</select></p>


<p>Buscar por:  <select id="query" name="query" >
<option>Record</option>
<option>Persona</option>
<option>Cheque</option>
<option>Transaccion</option>
<option>Fecha (DD-MM-AAAA)</option>
<option>Cantidad</option>




</select><input type="text" value="" name="string" />
<input type="submit" value="Buscar" name="Buscar" /></p>

<blockquote>

<fieldset><legend>Ejemplos</legend>

<p>Para buscar records de misiones Transaccion -> <b>Ingreso - Misiones</b></p>
<p>Para buscar records de Ofrenda Transaccion -> <b>Ingreso - Ofrenda</b></p>

</fieldset>




</blockquote>

</form>
</div>

</center>



</body>

</html>
