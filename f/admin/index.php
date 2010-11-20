<?PHP

session_start();
if ($_SESSION['loggedin'] != 1 )
{

header('Location: ../login.php');

exit();


}
?>

<html>



<head>
<title>
Administration - RESTRICTED!
</title>
<link href="../main.css" rel="stylesheet" type="text/css"/>

<style type="text/css"> 
table { margin: 1em; }
td, th { padding: .3em; border: 1px #ccc solid; } 
</style>
</head>
<body>
<center><h1>Church Administration</h1></center>
<fieldset>
<center><form method="GET">
<label>Find Record: </label><input type="text" name="record" /></label><label>In : <select name="db" id="db"><option>Inc</option><option>Ex</option></select><input type="submit" value="View" />
</form>
</center>
</fieldset>

<center><div id="displayRecord">


<?PHP include '../config.php';
include '../opendb.php'; ?>

<?PHP 

$rec = $_GET['record'];

$database = $_GET['db'];

if ($database == 'Inc')
{
$sql6 = "SELECT *  FROM `bbudget_inc` WHERE `id` = '$rec'";
}else
{
$sql6 = "SELECT *  FROM `bbudget_ex` WHERE `id` = '$rec'";
}



echo "<label style='color:red;'>DATABASE: $database</label>";

$result6 = mysql_query($sql6);
echo "<table>";
echo "<tr>";
echo "<form name='update' action='mod.php' method='POST'>";
while ($row6 = mysql_fetch_array($result6)) 
{



echo "<input type='hidden' name='db' value='$database' />";

echo "<tr><td>Record</td><td><input type='text' name='id' value='$row6[0]' readonly='readonly'/></td></tr>";
echo "<tr><td>Trans</td><td><input type='text' name='trans' value='$row6[1]'/></td></tr>";
echo "<tr><td>Person</td<td><input type='text' name='person' value='$row6[2]'/></td></tr>";
echo "<tr><td>Desc</td<td><textarea rows='2' cols='20' name='desc'>$row6[3]</textarea></td></tr>";
echo "<tr><td>Check#</td<td><input type='text' name='check' value='$row6[4]' /></td></tr>";
echo "<tr><td>Amount</td<td><input type='text' name='amount' value='$row6[5]'/></td></tr>";
echo "<tr><td>Date</td<td><input type='text' name='fecha' value='$row6[6]' /></td></tr>";
echo "<tr><td>Ver</td<td><input type='text' name='ver' value='$row6[7]' /></td></tr>";
echo "<tr><td>Ver2</td<td><input type='text' name='by' value='$row6[8]' /></td></tr>";
} 
echo "</tr>";
echo "<tr><td>";
echo "<input type='submit' value='Update' name='update'/></td></tr>";

echo "</table>";
echo "</form>";


?>

<form name="drop" action="drop.php" method="POST">

<label>Drop Record: <input type="text" name="record" value="<?PHP echo $rec; ?>" readonly='readonly'/>
<input type="hidden" name="db" value="<?PHP echo $database; ?>"/>

<input type="submit" value="Drop" name="drop"/>


</form>

</div></center>


<?PHP




echo "<b>Host URL: </b> <a href='https://p3smysqladmin01.secureserver.net/p50/261/index.php?uniqueDnsEntry=bbudget.db.4617423.hostedresource.com'>Database Login</a>";
echo "<br />";
echo "<b>Database: </b>".$dbuser;
echo "<br />";
echo "<br />";

echo "Last 5 Records added to <b>BBudgt_inc:</b><br />";
displayLastIncome();
echo "<br />";
echo "Last 5 Records added to <b>BBudget_ex:</b><br />";
displayLastExpense();
echo "<br />";
echo "Last 4 Records added to <b>person</b><br />";
displayLastPerson();
echo "<br />";

function displayLastIncome()
{

$sql = "SELECT *  FROM `bbudget_inc` ORDER BY `id` DESC LIMIT 0 , 5";

$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) 
{
echo "<a href='../irecord.php?record=$row[0]' target='_blank'>$row[0]</a> <br />";
} 

}

function displayLastExpense()
{
$sql2 = "SELECT *  FROM `bbudget_ex` ORDER BY `id` DESC LIMIT 0 , 5";

$result2 = mysql_query($sql2);
while ($row2 = mysql_fetch_array($result2)) 
{

echo "<a href='../erecord.php?record=$row2[0]' target='_blank'>$row2[0]</a> <br />";


} 


}

function displayLastPerson()

{
$sql3 = "SELECT *  FROM `person` ORDER BY `id` DESC LIMIT 0 , 5";

$result3 = mysql_query($sql3);
while ($row3 = mysql_fetch_array($result3)) 
{

echo "$row3[1]<br />";


} 


}


mysql_close($conn);
?>


</body>

</html>




