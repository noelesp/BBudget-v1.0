<?php 	  
	  include 'auth.php';
	  include 'ok.php';
	
		  
		 
if ($_SESSION['iplogged'] != 1)
	{
	terminate();
	}
	
		  
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>BBudget - Iglesia Bautista Buenas Nuevas</title>


<link href="main.css" rel="stylesheet" type="text/css"/>

</head>

<body>
<?PHP $username = $_SESSION['username'];?>

<p style="text-align: right;"><!---<img src="../a/media/user.png" >!---><?PHP echo "<a href='auditResult.php'>".$username."</a>"; ?> | <a href="logout.php">Cerrar Sesion</a>
<table style="width: 100%">
	<tr>
		<td colspan="2"><center><img src="css/logo.png" alt="Iglesia Buenas Nuevas Logo" style="style1" /><p>Finanzas</p></center><br /></td>
	</tr>
	<tr>
		<td style="width: 514px"><center><img alt="" height="32" src="css/calculator_add.png" style="float: left" width="32"/><h3>Reportar Ingresos</h3></center></td>
		<td><center><img alt="" height="32" width="32" style="float: left" src="css/calculator_delete.png" /><h3>Reportar Gastos</h3></center></td>
	</tr>
	<tr>
		<td style="width: 514px"><fieldset><br/><blockquote><p>
	<a href="ofrenda.php">
	<img alt="" height="32" src="css/money_dollar.png" style="float: left" width="32" class="style1" /></a>
	<a href="ofrenda.php">Ofrenda Semanal Cash</a></p></blockquote>
<blockquote><p>
		<a href="ofrenda2.php">
		<img alt="" height="32" src="css/money_add.png" style="float: left" width="32" class="style1" /></a>&nbsp;
		<a href="ofrenda2.php">Ofrenda/Misiones Individual</a></p></blockquote>
		
		</fieldset></td>
		<td><fieldset>
		<blockquote><p>
	<a href="salary.php">
<img alt="" height="32" src="css/status_online.png" style="float: left" width="32" class="style1" /></a>&nbsp; 
	<a href="salary.php">Salarios</a></p></blockquote>
	
	<blockquote><p><a href="bill.php">
	<img alt="" height="32" src="css/script_delete.png" style="float: left" width="32" class="style1" /></a>&nbsp; 
	<a href="bill.php">Bill</a></p></blockquote>
	
	<blockquote><p><a href="gasto.php">
	<img alt="" height="32" src="css/basket_delete.png" style="float: left" width="32" class="style1" /></a>&nbsp;
	<a href="gasto.php">Gasto</a></p></blockquote>
	
		</fieldset></td>
	</tr>
	<tr>
		<td style="width: 514px"><fieldset><p><strong>Resumen Hasta La Fecha:</strong></p>
<?PHP 

	//Get Totals For Current Fiscal Year
	include 'getYearTotal.php';

	$income = round(YTDIncomeTotal());
	$expense = round(YTDExpenseTotal());
	$mission = round(yearMissionTotal());
	
	$do = $income + $expense + mission;
	
	$income = ($income / $do)  * 100;
	$expense = ($expense / $do) * 100;
	$mission = ($mission /$do) * 100;
	
	
	echo "<img src='http://chart.apis.google.com/chart?chs=250x100&amp;chd=t:$income,$expense,$mission&amp;chco=00FF00|FF0000|0000F4&amp;cht=p3&amp;chl=Ingresos|Gastos|Misiones' >";

		
		
 	echo "<p>Ingresos : <span id='ingresos'><b>+$".number_format(YTDIncomeTotal(), 2)."</b></span></p>";

 	echo "<p>Gastos   : <span id='gastos'><b>-$".number_format(YTDExpenseTotal(), 2)."</b></span></p>";

	echo   "<p>Balance : <span id='cambio'><b>$".number_format(YTDIncomeTotal() - YTDExpenseTotal(), 2)."</b></span></p>";
	echo  "<br/>";
	echo "<p>Total Misiones: $".number_format(yearMissionTotal(), 2)."</p>";
	
 
 ?>
	

		</fieldset></td>
		<td>	<form accept-charset="utf-8"  action="vreport.php"  method="post" name="viewreport">
		<fieldset><legend><b>Reportes</b></legend>
		
		<blockquote><p>Reportes : <select id="vreport" name="vreport">
		<option value="query">Buscar Record</option>
		<option value="personreport">Reporte Personal</option>
		<option value="FechaOfrendaSemanal">Reporte Semanal Ofrendas</option>
		<option value="FechaOfrendaMensual">Reporte Mensual Ofrendas</option>
		<option value="OfrendaAnual">Reporte Anual Ofrendas</option>
		<option value="OfrendaAnualDetallado">Reporte Anual Ofrendas detallado</option>
		<option value="GastosMensuales">Reporte Mensual Gastos</option>
		<option value="GastosAnuales">Reporte Anual Gastos</option>
		<option value="GastosAnualesDetallado">Reporte Anual Gastos detallado</option>
		<option value="GastosOfrendasAnuales">Reporte Gastos y Ofrendas</option>
	
		
		</select><input type="submit" value="Ver" name="submit" /></p></blockquote>
		
		</fieldset>
		</form>
		</td>
		
	</tr>
</table>
<center>
<?PHP include 'footer.php' ?>
</center>
</body>

</html>
