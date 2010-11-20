<?php include 'auth.php'; ?>
<?PHP

$vreport = filter_input(INPUT_POST,"vreport");


if ($vreport == "FechaOfrendaSemanal")
{
header ( 'Location: Fecha-Ofrenda-Semanal.php'); 

}
elseif ($vreport == "FechaOfrendaMensual")

{
header ( 'Location: Fecha-Ofrenda-Mensual.php');
}

elseif ($vreport == "OfrendaAnual")
{

header ( 'Location: Ofrenda-Anual.php');
}

elseif($vreport == "OfrendaAnualDetallado") 
{

header ( 'Location: Ofrenda-Anual-Detallado.php');
}

elseif($vreport == "query")
{
header ( 'Location: query.php');
}
elseif($vreport == "GastosMensuales")
{
header ( 'Location: Gastos-Mensuales.php');
}
elseif($vreport == "GastosAnuales")
{
header ( 'Location: Gastos-Anuales.php');
}
elseif($vreport == "GastosAnualesDetallado")
{
header ( 'Location: Gastos-Anuales-Detallado.php');
}
elseif ($vreport == "GastosOfrendasAnuales")
{

header ( 'Location: Anual-Gastos-Ofrendas.php');

}
elseif($vreport == "personreport")
{
header ( 'Location: Reporte-Persona.php');
}

?>
