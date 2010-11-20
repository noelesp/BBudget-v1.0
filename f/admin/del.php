<?PHP

session_start();
if ($_SESSION['loggedin'] != 1 )
{

header('Location: ../login.php');

exit();


}
?>

<?PHP

include '../config.php';
include '../opendb.php'; 

$record =  filter_input(INPUT_POST,"id");
$database =  filter_input(INPUT_POST,"database");

echo "Deleting $record found in $database";

if ($database == "Inc")

{

$sql = "DELETE FROM `bbudget_inc` WHERE `bbudget_inc`.`id` = $record LIMIT 1";

}
else
{
$sql = "DELETE FROM `bbudget_ex` WHERE `bbudget_ex`.`id` = $record LIMIT 1";

}

if (!mysql_query($sql,$conn))
						{
							die('Error: ' . mysql_error());
						}
						
mysql_close($conn);


echo "<center><h2 style='color:green;'>Success!</h2></center>\n";
echo "<center><a href='index.php>Go Back</a></center>";


?>
