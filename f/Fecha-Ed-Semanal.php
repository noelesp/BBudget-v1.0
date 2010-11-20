<?php include 'auth.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Reporte - Semanal</title>

<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>

<body>
<center>
<div id="header">
<center><p>Iglesia Bautista Buenas Nuevas</p></center>

<center><h1>Reporte Semanal - Asistencia</h1></center>


<form accept-charset="utf-8"  action="viewReport.php"  method="GET" name="rp_ofrendasemanal">
<p>Semana: <select id="fecha" name="fecha" >
<?PHP
  
    // Include configuration and open database
	
include 'db.php';

	
	// SQL query to grab description from bbudget_type database
	$getdesc = 'SELECT DISTINCT `date` FROM `ed_attendance` ORDER BY `id` DESC LIMIT 0, 30 ';
	
	// Query the database and return any errors
	$result = mysql_query($getdesc) or die(mysql_error());
	
	
	//Grab fields and store them in an array
	while($row = mysql_fetch_array($result)) 
	{
	
	$fecha = $row['date'];
	

	
	//Output descriptions
	echo "<option>".$fecha."</option>";
	}
	//Close the connection 
	mysql_close($conn);
  
  ?>

</select> 
<input type="submit" value="Ver Reporte" name="Ver Reporte" /></p>

</form>

</div>
</center>
</body>

</html>
