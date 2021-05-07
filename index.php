<!DOCTYPE html>
<html>
	<head>
		<title>Weather</title>
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		 <meta name="description" content="">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="icon" type="image/ico" href="image/icon.ico">
	        <link rel="stylesheet" type="text/css" href="style.css?rnd=132">	
	</head>
	<body onload="myFunction()">
		<div id="loader">
			<img class="preloader" src="image/loader.gif">			
			<p>LOOKING OUTSIDE FOR YOU... <br>ONE SEC</p>						
		</div>
		<script>
			var myVar;

			function myFunction() {
			  myVar = setTimeout(showPage,10000);
			}

			function showPage() {
			  window.open("weather.php","_self");
			}
		</script>
	</body>
</html>
