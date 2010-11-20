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


$name = $_SESSION['username'];

$perm = $_SESSION['access'];
echo $perm;





echo "<center>";
echo "<p>Iglesia Bautista Buenas Nuevas </p>";
echo "<h3>Sesiones Recientes</h3>";




echo "</center>";
?>

<fieldset><legend>Ultimas Sesiones</legend>

<br/><br/>


<table style="width: 100%">
	<tr>
		<td><b>Record</b></td>
		<td><b>Usuario</b></td>
		<td><b>IP Address</b></td>
		<td><b>Fecha</b></td>
	</tr>
	


<?PHP


if ( $perm == "A")
{

$sql = "SELECT *  FROM audit ORDER BY `id` DESC";

}
else
{
$sql = "SELECT *  FROM audit WHERE `username` LIKE '$name' ORDER BY `id` DESC";
}

$result = mysql_query($sql);
 

 
 echo "<p></p>";
 
 while ($row = mysql_fetch_array($result)) 
{




echo "<td>$row[0]</td>";
if ($row[1] != $_SESSION['username'])
{
echo "<td style='color:red;'>$row[1]</td>";

}
else
{
echo "<td>$row[1]</td>";
}
echo "<td><a href='http://www.maxmind.com/app/locate_demo_ip?ips=$row[2]'>$row[2]</a></td>";
echo "<td>$row[3]</td>";


echo "</tr>";



} 
echo "</table>";
mysql_close($conn);


echo "<center>";
print "<p><a href='index.php'>Inicio</a></p>";
echo "</center>";
?>

</fieldset>

</body>

</html>
