<?PHP

$host = '';       //URL TO YOUR DATABASE
$dbuser = '';     //DB USERNAME
$key = '';        //PASSWORD
$dbname = '';     //DATABASE NAME

$conn = mysql_connect($host, $dbuser, $key) or die (mysql_error());
mysql_select_db($dbname, $conn);

?>


