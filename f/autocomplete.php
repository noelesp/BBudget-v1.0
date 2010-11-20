<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
                    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <link rel="stylesheet" href="http://dev.jquery.com/view/trunk/plugins/autocomplete/demo/main.css" type="text/css" />
  <link rel="stylesheet" href="http://dev.jquery.com/view/trunk/plugins/autocomplete/jquery.autocomplete.css" type="text/css" />
  <script type="text/javascript" src="http://dev.jquery.com/view/trunk/plugins/autocomplete/lib/jquery.bgiframe.min.js"></script>
  <script type="text/javascript" src="http://dev.jquery.com/view/trunk/plugins/autocomplete/lib/jquery.dimensions.js"></script>
  <script type="text/javascript" src="http://dev.jquery.com/view/trunk/plugins/autocomplete/jquery.autocomplete.js"></script>
  <?PHP
    include 'config.php';
	include 'opendb.php';
	
	// SQL query to grab person name from person database
	$getName = 	'SELECT `person` FROM `person` ORDER BY `person` ASC';
	
	// Query the database and return any errors
	$resultName = mysql_query($getName) or die(mysql_error());
	
	$dis = Array();
	$x = 0;
	
	//Grab fields and store them in an array
	while($personName = mysql_fetch_array($resultName)) 
	{
	
	//Output name
	 $dis[$x] = $personName['person'];
	 $x++;
	}
	//Close the connection 
	mysql_close($conn);
  
  ?>
  
  <script>
  $(document).ready(function(){
    var data = "<?PHP for($i = 0; $i < sizeof($dis); ++$i) { echo $dis[$i].','; }?>".split(",");
$("#example").autocomplete(data);
  });
  </script>
  
</head>
<body>
  API Reference: <input id="example" /> (try "C" or "E")
  <?PHP echo $dis[2]; ?>
  
</body>
</html>
