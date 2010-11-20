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
<link href="../main.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<?PHP

include '../config.php';
include '../opendb.php'; 

$id = filter_input(INPUT_POST,"id"); 
$name = filter_input(INPUT_POST,"person");
$desc = filter_input(INPUT_POST,"desc");
$check = filter_input(INPUT_POST,"check");
$trans = filter_input(INPUT_POST,"trans");
$amount = filter_input(INPUT_POST,"amount");
$fecha = filter_input(INPUT_POST,"fecha");
$ver = filter_input(INPUT_POST,"ver");
$by = filter_input(INPUT_POST,"by");
$db  = filter_input(INPUT_POST,"db");


if ($db == 'Inc')
{
$database = "bbudget_inc";
$sql = "UPDATE `bbudget`.`$database` SET `transaction` = '$trans', `person` = '$name', `desc` = '$desc', `check` = '$check', `amount` = '$amount', `date` = '$fecha', `submitter` = '$ver', `verified by` = '$by' WHERE `$database`.`id` = $id LIMIT 1;";

}else
{
$database = "bbudget_ex";
$sql = "UPDATE `bbudget`.`$database` SET `transaction` = '$trans', `person` = '$name', `desc` = '$desc', `check` = '$check', `amount` = '$amount', `date` = '$fecha', `submitter` = '$ver' 
 WHERE `$database`.`id` = $id LIMIT 1;";

}



if ($id == NULL || $name == NULL || $desc == NULL || $amount == NULL || $fecha == NULL || $ver == NULL || $by == NULL)
{


echo "<center><h4 style='color:red;'>Fields cannot be empty! Please go back and complete all required fields!</h4></center>\n";
echo "<center><A HREF='javascript:history.go(-1)'>Go Back</A></center>";

exit();



}
else
{




//CAPTURE SQL Error
if (!mysql_query($sql,$conn))
						{
							die('Error: ' . mysql_error());
						}
						
mysql_close($conn);


echo "<center><h2 style='color:green;'>Success!</h2></center>\n";
echo "<center><a href='index.php>Go Back</a></center>";

}




?>



</body>
</html>

