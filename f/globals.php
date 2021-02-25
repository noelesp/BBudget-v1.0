<?PHP

// Filename: globals.php
// 
// Contains reusable snippets of codes and functions
// 
//
// (C)2010 noelesp All Rights Reserved.



//Include DB Connection Strings
include 'config.php';
include 'opendb.php';




//LOCALIZATION SPANISH

$S_MONTH  = array(1 => "Enero", 2=>"Febrero", 3=>"Marzo", 4=>"Abril", 5=>"Mayo", 6=>"Junio", 7=>"Julio", 8=>"Agosto", 9=>"Septiembre", 10=>"Octubre", 11=>"Noviembre", 12=>"Diciembre");
$S_DAY    = array(1 => "Lunes", 2=>"Martes", 3=>"Miercoles", 4=>"Jueves", 5=>"Viernes", 6=>"Sabado", 7=>"Domingo");

//GET PREVIOUS YEARS
$S_YEAR   = array(1 => date('Y'), 2=>(date('Y')-1), 3=>(date('Y')-2), 4=>(date('Y')-3) );



// FUNCTION TO REDIRECT USER.

function Redirect($url)
{
print "<script>";
print "window.location = '$url'";
print  "</script>";
}


//Function to Display Message 
function alert($msg)
{
print "<script>";
print "alert('$msg');";
print "</script>";
}


//Function To Return Today's date in our format

function Today()
{
$hoy = date("m-d-y");
return $hoy;
}


//Function Return's the IP address
function get_ip() 

//Code to grab the user's IP address and stored it in $ip

{
    global $HTTP_X_FORWARDED_FOR, $REMOTE_ADDR;
        if(!isset($HTTP_X_FORWARDED_FOR)) {
            $ip = $_SERVER['REMOTE_ADDR'];
       }else {
                $ip = $HTTP_X_FORWARDED_FOR;
       }
       return $ip;
}

//Function to Validate Users, given username and password

function authenticateUser($user, $pwd)
{

if(mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$user' AND password ='$pwd'")))
{
	return TRUE;
}else
{
return FALSE;
}

}

//Function to add given user, ip and time to Audit Database

function AuditUser($name, $ip, $time)
{
//Adds entry to audit table about this username, ip and time.

include 'config.php';
include 'opendb.php';

$sql = ("INSERT INTO `audit` (`id`, `username`, `ip`, `time`) VALUES (NULL, '$name', '$ip','$time')");

	//CAPTURE SQL Error
	if (!mysql_query($sql,$conn))
		{
		   die('Error: ' . mysql_error());
		}
						


}

//Function to terminate the current session
function terminate()
{
session_start(); 
unset($_SESSION['loggedin']);
unset($_SESSION['username']);
unset($_SESSION['access']);
unset($_SESSION['iplogged']);
session_destroy();

}

