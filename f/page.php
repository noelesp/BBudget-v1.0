<?PHP 
// Filename: page.php
// 
// Process Login.php values and authenticates user against database
// Creates session and allows the user to proceed to the program
//
// (C)2010 Noel Espinales All Rights Reserved.


//Starts the Session
session_start();

//DB Connection Strings
include 'globals.php';

//Grab values from Login.php
$name = $_POST['name'];
$pwd = $_POST['pwd'];
$ip  = $_POST['ip'];


//SHA1 encryption for password
$pwd = sha1($pwd);

//Authenticates the user against the database with the given credentials

$validated = authenticateUser($name, $pwd);
if ($validated == TRUE)
{

//SQL statement to grab user's permission from the databse and store them in $permission
$sql2 = "SELECT * FROM users WHERE username = '$name' AND password ='$pwd'";
	
	$resultName = mysql_query($sql2) or die(mysql_error());
	
	//Grab field and store them in an array
	while($cName = mysql_fetch_array($resultName)) 
	{
	$permission = $cName[3];
	}
	
$_SESSION['loggedin'] = 1; 			// store session data
$_SESSION['username'] = $name;			// set username
$_SESSION['access'] = $permission;      	// Grab permissions
$time = date("F j, Y, g:i a");   		// Set date format


//Adds entry to audit table about this username, ip and time.

AuditUser($name, $ip, $time);
						


			

					//Close SQL Connection !
					mysql_close($conn);
					
//We have logged in the IP		
$_SESSION['iplogged'] = 1;

						
				
//Redirect user to index.php (Application)

Redirect("index.php");

}
else    
{

//If the user fails to authenticate, set session to 0 and start counting failed attempts
//Redirect user to login.php  with 'd' flag, d = denied.

$_SESSION['loggedin'] = 0;

if(isset($_SESSION['attempts']))
    $_SESSION['attempts'] = $_SESSION['attempts']+ 1;
else
    $_SESSION['attempts'] = 1;

Redirect("login.php?flag=d");


}





?>

