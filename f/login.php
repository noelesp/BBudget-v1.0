<?PHP 

// Filename: login.php
// 
// Login screen for user to initiate a session
// 
//
// (C)2010 Noel Espinales All Rights Reserved.


session_start(); 

include 'globals.php';


?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>BBudget - Login </title>

<link href="login.css" rel="stylesheet" type="text/css" />

</head>

<body>

<?PHP
//    The following code is used to receive flags 
//	  and display them to the user. Flags are received from ** page.php


$flag  = $_GET['flag'];   

if ($flag == "d") 
{
	$message = "Favor de tratar de nuevo!";
}
elseif ($flag == "t")
{
	$message = "Sesion Terminada";
}

// The following code kicks the user out after 5 failed attempts to login
// $_SESSION['attempts'] is set and initialized in ** page.php

if ($_SESSION['attempts'] >= 5)
{
	alert("Ha fallado mas de cinco veces. Favor de cerrar este window y tratar de nuevo!");
	Redirect("http://www.google.com");
}
?>


<div id="content">
<h4><span id="title">Iglesia Bautista Buenas Nuevas</span></h4>
<form action="page.php" method="POST"> <br />

<label>Nombre: </label>&nbsp;&nbsp;<input type="text" name="name" /> <br />
<label>Password:</label>&nbsp;<input type="password" name="pwd" /><br />
<br />
<span><?PHP echo "<label style='color: #FF0000;'>".$message."</label>";?></span>
<?PHP
 $user_ip = get_ip();
       echo "<input type='hidden' name='ip' value='$user_ip'/>";
?>
<p style="text-align: right"><span id="btn" class="btn"><input class="btn" type="submit" value="Entrar" /></span></p>
</form>
<span id="notice" style="color:#C0C0C0;">(C) <?php echo date('Y'); ?> - Iglesia Bautista Buenas Nuevas</span>
<p style="font-size: 9px;">Initiating session from <?php echo $user_ip; ?></p>
</div>
</body>
</html>

