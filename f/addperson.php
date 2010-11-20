<?php include 'auth.php'; ?>
<html>

<head>


<title>

</title>


<SCRIPT LANGUAGE="JavaScript">

function reloadParentAndClose()
{
    // reload the opener or the parent window
    window.opener.location.reload();
    // then close this pop-up window
    window.close();
} 


</script>

</head>


<body>
<?PHP

//Database Connection Strings
//##############################
include 'config.php';         //
include 'opendb.php';         //
//##############################

$name = filter_input(INPUT_POST,"name"); 
$account = filter_input(INPUT_POST,"account");
$address = filter_input(INPUT_POST,"address");
$city = filter_input(INPUT_POST,"city");
$state = filter_input(INPUT_POST,"state");
$zip = filter_input(INPUT_POST,"zip");
$tel = filter_input(INPUT_POST,"tel");
$cel = filter_input(INPUT_POST, "cel");
$email = filter_input(INPUT_POST, "email");
$notes = filter_input(INPUT_POST, "notes");


if ($account == NULL)
{

	$account = "N/A";
	
}

if(mysql_num_rows(mysql_query("SELECT * FROM person WHERE person = '$name' AND account = '$account'")))

{

echo "<center><b>Este record ya existe</b></center>";

}
else
{

$sql = "INSERT INTO `bbudget`.`person` (`id`, `person`, `account`, `address`, `town`, `state`, `zipcode`, `telephone`, `mobile`, `email`, `note`) VALUES (NULL, '$name', '$account', '$address', '$city', '$state', '$zip', '$tel', '$cel', '$email', '$notes')";

if (!mysql_query($sql,$conn))
		{
				die('Error: ' . mysql_error());
		}
						
					
			
					echo "<center><p><img src='css/accept.png'/> Registro Agregado</p></center>";

					mysql_close($conn);


}



					
						
						
					
					
				
?>
<center>

<a href="javascript:reloadParentAndClose();">Cerrar</a>

</center>

</body>

</html>


