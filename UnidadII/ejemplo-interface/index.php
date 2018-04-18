<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		include("interface-humano.php");
		include("interface-servivo.php");
		include("class-ingeniero.php");
		$i = new Ingeniero();
		$i->nacer();
	?>
</body>
</html>
