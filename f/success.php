<?php include 'auth.php'; ?>
<?PHP

include 'config.php';         //
include 'opendb.php';         //

//Grab referrer window to determine what records to pull

$database = $_GET['db'];



if ($database == "ad" )
{

$sys = 1;

$sql = "SELECT *  FROM `bbudget_inc` ORDER BY `id` DESC LIMIT 0 , 1";

}elseif ($database == "ex")

{
$sys = 0;

$sql ="SELECT *  FROM `bbudget_ex` ORDER BY `id` DESC LIMIT 0 , 1";
}

$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) 
{
echo "<center>";

echo "<h1>Record: $row[0]</h1>";
echo "<h3>Persona: $row[2]</h3>";
echo "<blockquote>Cantidad: $$row[5]</blockquote>";
echo "<p><img src='css/accept.png'/> Registro Agregado</p></center>";


} 

mysql_close($conn);
	
				
echo "<br />";

if ($sys == 1) 
{
echo "<center><p><a href='ofrenda2.php'>Continuar</a></p></center>";
}
elseif($sys == 0)
{
echo "<center><p><a href='index.php'>Continuar</a></p></center>";

}
				
echo "</center>";








?>
