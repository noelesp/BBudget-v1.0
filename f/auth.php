<?PHP
session_start();
require_once('globals.php');

if ($_SESSION['loggedin'] != 1)
{
Redirect("login.php");
}


?>
