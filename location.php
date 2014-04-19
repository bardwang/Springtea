<html>
 <head>
  <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
 </head>
 <body> 
	<script type="text/javascript">
	city = geoplugin_city();
	state = geoplugin_region();
	window.location.href = "location2.php?city=" + city + "&state=" + state;
	</script>
 </body>
</html>