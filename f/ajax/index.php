<html>
	<head>		
		<script type="text/javascript" src="prototype.js"></script>
		<script>

			function sendRequest() {
				new Ajax.Request("test.php", 
					{ 
					method: 'post', 
					postBody: 'name='+ $F('name'),
					onComplete: showResponse 
					});
				}

			function showResponse(req){
				$('show').innerHTML= req.responseText;
			}
		</script>
	</head>

	<body>
		<form id="test" onsubmit="return false;">
			<input type="text" name="name" id="name" >
			<input type="submit" value="submit" onClick="sendRequest()">
		</form>
		
		<div id="show"></div>
	</body>

</html>

