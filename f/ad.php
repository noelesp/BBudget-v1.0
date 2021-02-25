<?php 

// Filename: ad.php
// 
// Adds information to bbudet_inc database after it checks all information is valid
// 
//
// (C)2010 noelesp All Rights Reserved.




include 'auth.php';  //Make sure user is authenticated

?>
<html>

<head>
</head>

<body>
<?PHP

//Database Connection Strings
//##############################
include 'config.php';         //
include 'opendb.php';         //
//##############################

//Capture variables and store them


$name = filter_input(INPUT_POST,"person"); 
$desc = filter_input(INPUT_POST,"desc");
$trans = filter_input(INPUT_POST,"trans");
$check = filter_input(INPUT_POST,"check");
$amount = filter_input(INPUT_POST,"amount");
$date = filter_input(INPUT_POST,"fecha");
$submitter = filter_input(INPUT_POST,"submitter");
$ver = filter_input(INPUT_POST, "verified");

$date = explode('-', $date);



$date = $date[1]."-".$date[0]."-".$date[2];


//Verify that fields are not empty
if ($date == NULL )
{
	echo "El campo de Fecha esta vacio";
	echo "<a href='javascript:history.go(-1)'>Regresar</a>";
	exit();

}elseif ($name == NULL) 
{
	echo "El campo de Persona esta vacio";
	echo "<a href='javascript:history.go(-1)'>Regresar</a>";
	exit();
	
}elseif ($desc == NULL) 
{
	echo "El campo de descripcion esta vacio";
	echo "<a href='javascript:history.go(-1)'>Regresar</a>";
	exit();
	}
	elseif ($trans == NULL )
	{
	echo "El campo de Transaccion esta vacio";
	echo "<a href='javascript:history.go(-1)'>Regresar</a>";
	exit();
		}
		  elseif ($amount == 0 || $amount == NULL)
			{
				echo "El campo de Cantidad esta vacio";
				echo "<a href='javascript:history.go(-1)'>Regresar</a>";
				exit();
				}
				elseif ($submitter == NULL) 
				{
				echo "El campo Verificado esta vacio";
				echo "<a href='javascript:history.go(-1)'>Regresar</a>";
				exit();
					}
					else
					{
					
					// All looks good, proceed
					
					if ($check == NULL) {
					
					$check = "N/A";
					}
					
					$sql = ("INSERT INTO `bbudget_inc` (`id`, `transaction`, `person`, `desc`, `check`, `amount`, `date`, `submitter`, `verified by`) VALUES (NULL, '$trans', '$name', '$desc', '$check', '$amount', '$date', '$submitter', '$ver')");

					
					//CAPTURE SQL Error
					if (!mysql_query($sql,$conn))
						{
							die('Error: ' . mysql_error());
						}
						


			

					//Close SQL Connection !
					mysql_close($conn);
					print "<script>";
					print " self.location='success.php?db=ad';";
					print "</script>"; 
	
					}			
				
?>



</body> 
</html>

