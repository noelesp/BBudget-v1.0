<?PHP

if ($_SESSION['access'] != "F" && $_SESSION['access'] != "A")
{
unset($_SESSION['access']);

session_destroy();
echo "<center><h3 style='color:red;'>Usted no tiene permiso para entrar a esta area</h3><p><a href='http://iglesia-lilburn.org/f/'>Continuar</a></p></center>";



exit();

}

?>
