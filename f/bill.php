<?php include 'auth.php'; ?>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Iglesia Bautista Buenas Nuevas </title>

<link rel="stylesheet" type="text/css" href="css/bbudget.css" />
<style type="text/css">
.style1 {
	text-align: center;
}
</style>
<SCRIPT LANGUAGE="JavaScript">

<!-- Begin
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=600,height=600,left = 550,top = 200');");
}
// End -->
</script>
</head>

<body>

<table width="100%" cellpadding="2" cellspacing="0" class="tbmain">
<tr><td class="topleft" width="10" height="10">&nbsp;</td>
<td class="topmid">&nbsp;</td>
<td class="topright" width="10" height="10">&nbsp;</td>
  </tr>
<tr>
<td class="midleft" width="10">&nbsp;&nbsp;&nbsp;</td>
<td class="midmid" valign="top">
<form accept-charset="utf-8"  action="ex.php"  method="post" name="bbudget">

<div id="main"> 
<div class="pagebreak"> 
<table width="520" cellpadding="5" cellspacing="0">
 <tr >
  <td colspan="2" class="head" >
   Bill</td>
 </tr>
 <tr >
  <td width="150" class="left" >
   <label>Fecha</label>
  </td>
  <td class="right">
   <script type="text/javascript" src="css/datetimepicker.js"></script>
  <input type="text" class="text" size="10" name="fecha" id="fecha"  value="<?PHP echo date("j-n-Y"); ?>" /> 
   <a href="javascript:NewCal('fecha','ddmmyyyy',false,12)">
    <img src="css/cal.gif"border="0" alt="Selecione la fecha" /></a><span id="f"></span>
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >
   <label >Persona</label>
  </td>
  <td class="right" >
  <select name="person" class="other"  id="person" >
   <?PHP
		include 'getNames.php';
   ?>
    </select><span id="n"></span>
   	<a HREF="javascript:popUp('http://iglesia-lilburn.org/f/person.php')">Agregar Persona<a/>
  <span id="n"></span>
  </td>
 </tr>
 <tr >
  <td width="150" class="left"  valign="top" >
   <label>Transacción</label>
  </td>
  <td class="right">
   <select class="other" name="trans" id="trans" > 

  <?PHP
  
    // Include configuration and open database
	
    include 'config.php';
	include 'opendb.php';
	
	// SQL query to grab description from bbudget_type database
	$getdesc = 	'SELECT * FROM `bbudget_type` WHERE `desctype` LIKE \'%Bill%\' ';
	
	// Query the database and return any errors
	$result = mysql_query($getdesc) or die(mysql_error());
	
	
	//Grab fields and store them in an array
	while($row = mysql_fetch_array($result)) 
	{
	
	//Output descriptions
	echo "<option>".$row['desctype']."</option>";
	}
	//Close the connection 
	mysql_close($conn);
  
  ?>

   </select>
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >
   <label >Check #</label>
  </td>
  <td class="right" >
   <input type="text" size="20" name="check" class="text" value="" id="check"  maxlength="100"  />
  </td>
 </tr>
 <tr >
  <td width="150" class="left" valign="top"  >
   <label>Descripción</label>
  </td>
  <td class="right" >
   <textarea cols="45" rows="5" name="desc" class="text" id="desc" ></textarea><br />
   <span id="d"></span>
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >
   <label >Cantidad $</label>
  </td>
  <td class="right" >
   <input type="text" size="20" name="amount" class="text" value="0" id="amount"  maxlength="100"  /><span id="a"></span>
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >
   <label >Verificado por</label>
  </td>
  <td class="right" >
   <input type="text" size="20" name="submitter" class="text" value="" id="submitter"  maxlength="100"  /><span id="s"></span>
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >&nbsp;
 
  </td>
  <td class="right">
  <input onclick="checkFields();" type="button" class="btn" value="Agregar" />
 </td>
 </tr>
 <tr >
  <td width="150" class="left" >&nbsp;</td>
  <td class="right" style="text-align: center">
  <a href="index.php">Menu Principal</a></td>
 </tr>
</table>
</div>
</div>
</form>
</td>
<td class="midright" width="10">&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
 <td class="bottomleft" width="10" height="10">&nbsp;</td>
 <td class="style1">&nbsp;</td>
 <td class="bottomright" width="10" height="10">&nbsp;</td>
</tr>
</table>
<script type="text/javascript">

function checkFields()

{




if  (bbudget.fecha.value.length==0)


document.getElementById("f").innerHTML="  *Campo esta vacio";

 
else if (bbudget.desc.value.length==0)


document.getElementById("d").innerHTML=" *Se necesita una descripcion";
 
 else if (bbudget.amount.value.length== 0 || bbudget.amount.value == 0)
 

 document.getElementById("a").innerHTML=" *Se requiere una cantidad";
 
 else if (bbudget.submitter.value.length==0)

 document.getElementById("s").innerHTML=" *Campo esta vacio";
 
 

 

 
 
 
 else bbudget.submit();
 }
 
</script>



</body>

</html>




