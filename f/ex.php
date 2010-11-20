<?php include 'auth.php'; ?>
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


$date = explode('-', $date);

$date = $date[1]."-".$date[0]."-".$date[2];
//Verify that fields are not empty
if ($date == NULL )
{
	echo "Date field is empty";

}elseif ($name == NULL) 
{
	echo "Name field is empty";
	
}elseif ($desc == NULL) 
{
	echo "Description field is empty";
	}
	elseif ($trans == NULL )
	{
		echo "Transaction field is empty";
		}
		  elseif ($amount == 0 || $amount == NULL)
			{
				echo "Amount field is empty";
				
				echo "<a href='javascript:history.go(-1)'>Return</a>";
				
				}
				elseif ($submitter == NULL) 
				{
					echo "Submmitter field is empty";
					}
					else
					{
					
					// All looks good, proceed
					
					if ($check == NULL) {
					
					$check = "N/A";
					}
					
					$sql = ("INSERT INTO `bbudget_ex` (`id`, `transaction`, `person`, `desc`, `check`, `amount`, `date`, `submitter`) VALUES (NULL, '$trans', '$name', '$desc', '$check', '$amount', '$date', '$submitter')");


					if (!mysql_query($sql,$conn))
						{
							die('Error: ' . mysql_error());
						}
									
					

					mysql_close($conn);
					print "<script>";
					print " self.location='success.php?db=ex';";
					print "</script>"; 
				
					}
					
				









?>

</body> 
</html>
