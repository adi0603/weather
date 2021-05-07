<!DOCTYPE html>
<html>
	<head>
		<title>Weather</title>
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		 <meta name="description" content="">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="icon" type="image/ico" href="image/icon.ico">
		<style type="text/css">
			body {
			  	background: #efefef;
			}
			p {
				left: 42%;
			   	position: absolute;
			   	top: 50%;
			   	font-family: Helvetica, 'Helvetica Neue', sans-serif;
				letter-spacing: 1px;
				color: #a0a0a0;
			}
			img {   
			   	left: 45%;
			   	position: absolute;
			   	top: 40%;
			}
			@media only screen and (max-width: 360px) {
			  	img {		   
				  	left: 35%;
				  	position: absolute;
				  	top: 40%;
				}
				p{
					left: 15%;
				  	position: absolute;
				  	top: 55%;
				  	font-family: Helvetica, 'Helvetica Neue', sans-serif;
				  	color: #a0a0a0;
				}
			}
		</style>
	</head>
	<body onload="myFunction()">
		<div id="loader">
			<img class="preloader" src="image/loader.gif">
			<center>
				<p>LOOKING OUTSIDE FOR YOU... <br>ONE SEC</p>
			</center>			
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