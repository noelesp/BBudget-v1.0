<?php include 'auth.php'; ?>
<?PHP


function reportHeader()

{

echo "<table>";
echo "<tr>";
echo "<td>";
echo "<center><img src='css/logo.png' alt='Iglesia Buenas Nuevas Logo'  /></center><br /><p><b>Titulo:</b> <i><u>$reportTitle</u></i></p><p><b>Fecha: </b><i>$info[1] de $mes $info[2]</i></p><p><b>Descripcion: </b><i>$description</i>";
echo "</td>";
echo "</tr>";

}

?>
