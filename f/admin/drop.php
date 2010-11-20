<?PHP
session_start();
if ($_SESSION['loggedin'] != 1 )
{

header('Location: ../login.php');

exit();


}
?>

<?PHP

$record =  filter_input(INPUT_POST,"record");
$database =  filter_input(INPUT_POST,"db");



echo "<center>";
echo "<h3>Are you sure you want to delete this record?</h3>";
echo "<br />";
echo "<label style='color:red;'>Database : $database </label>";
echo "<br />";

if ($database == "Inc")
{
echo "<label>Record : <a href='../irecord.php?record=$record' target='_blank'>$record</a> <br />";
}
else
{
echo "<label>Record : <a href='../erecord.php?record=$record' target='_blank'>$record</a> <br />";
}
echo "<br />";

echo "<br />";

echo "<form action='del.php' method='POST'>";

echo "<input type='hidden' value='$record' name='id' />";

echo "<input type='hidden' value='$database' name='database' />";
echo "<input type='submit' value='Yes, Delete!' />";

echo "</form>";







?>
