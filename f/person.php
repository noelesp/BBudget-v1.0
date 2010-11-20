<?php include 'auth.php'; ?>
<html>


<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css/bbudget.css" />


</head>

<body>



<table width="100%" cellpadding="2" cellspacing="0" class="tbmain">
<tr><td class="topleft" width="10" height="10">&nbsp;</td>
<td class="topmid">&nbsp;</td>
<td class="topright" width="10" height="10">&nbsp;</td>
  </tr>
   <td colspan="2" class="head" >
  <h4>Agregar Persona</h4> </td>
<tr>
<td class="midleft" width="10">&nbsp;&nbsp;&nbsp;</td>
<td class="midmid" valign="top">
<form accept-charset="utf-8"  action="addperson.php"  method="post" name="addperson">
<div id="main"> 
<div class="pagebreak"> 
<table width="520" cellpadding="5" cellspacing="0">
 <tr >
  <td width="150" class="left" >
   <label >Persona <span class="required">*</span></label>
  </td>
  <td class="right" >
   <input type="text"  name="name" class="text" value="" id="name" style="width: 100%"/><span id="s"></>
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >
   <label >Cuenta #</label>
  </td>
  <td class="right" >
   <input type="text" size="20" name="account" class="text" value="" id="account"  maxlength="100" maxsize="100" />
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >
   <label >Direccion</label>
  </td>
  <td class="right" >
   <input type="text" size="35" name="address" class="text" value="" id="address"  maxlength="100" maxsize="100" />
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >
   <label >Ciudad</label>
  </td>
  <td class="right" >
   <input type="text" size="20" name="city" class="text" value="" id="city"  maxlength="100" maxsize="100" />
  </td>
 </tr>
 <tr >
  <td width="150" class="left"  valign="top" >
   <label>Estado</label>
  </td>
  <td class="right">
   <select class="other" name="state" id="state" >
  <option></option>
    <option>AL</option>
    <option>AK</option>
    <option>AR</option>
    <option>AZ</option>
    <option>CA</option>
    <option>CO</option>
    <option>CT</option>
    <option>DC</option>
    <option>DE</option>
    <option>FL</option>
    <option selected>GA</option>
    <option>HI</option>
    <option>ID</option>
    <option>IL</option>
    <option>IN</option>
    <option>IA</option>
    <option>KS</option>
    <option>KY</option>
    <option>LA</option>
    <option>ME</option>
    <option>MD</option>
    <option>MA</option>
    <option>MI</option>
    <option>MN</option>
    <option>MS</option>
    <option>MO</option>
    <option>MT</option>
    <option>NE</option>
    <option>NV</option>
    <option>NH</option>
    <option>NJ</option>
    <option>NM</option>
    <option>NY</option>
    <option>NC</option>
    <option>ND</option>
    <option>OH</option>
    <option>OK</option>
    <option>OR</option>
    <option>PA</option>
    <option>RI</option>
    <option>SC</option>
    <option>SD</option>
    <option>TN</option>
    <option>TX</option>
    <option>UT</option>
    <option>VT</option>
    <option>VA</option>
    <option>WA</option>
    <option>WV</option>
    <option>WI</option>
    <option>WY</option>
   </select>
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >
   <label >Codigo Postal</label>
  </td>
  <td class="right" >
   <input type="text" size="20" name="zip" class="text" value="" id="zip"  maxlength="100" maxsize="100" />
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >
   <label >Telefono</label>
  </td>
  <td class="right" >
   <input type="text" size="20" name="tel" class="text" value="" id="tel"  maxlength="100" maxsize="100" />
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >
   <label >Celular</label>
  </td>
  <td class="right" >
   <input type="text" size="20" name="cel" class="text" value="" id="cel"  maxlength="100" maxsize="100" />
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >
   <label >E-mail</label>
  </td>
  <td class="right" >
   <input type="text" size="20" name="email" class="text" value="" id="email"  maxlength="100" maxsize="100" />
  </td>
 </tr>
 <tr >
  <td width="150" class="left" valign="top"  >
   <label>Notas</label>
  </td>
  <td class="right" >
   <textarea cols="35" rows="5" name="notes" class="text" id="notes" ></textarea>
  </td>
 </tr>
 <tr >
  <td width="150" class="left" >&nbsp;
 
  </td>
  <td class="right">
 <input onclick="checkFields();" type="button" class="btn" value="Agregar" />
 </td>
 </tr>
</table>
</div>
</div>
</form>
</td>
<td class="midright" width="10">&nbsp;&nbsp;&nbsp;</td>
</tr>
</table>
<script type="text/javascript">

function checkFields()

{




if  (addperson.name.value=="")


document.getElementById("s").innerHTML="  *Campo esta vacio";

 

 else addperson.submit();
 }
 
</script>

</body>

</html>
