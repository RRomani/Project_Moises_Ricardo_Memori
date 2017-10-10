<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<head>
	<script type="text/javascript" src="Memoryjs.js"></script>
	<link rel="stylesheet" type="text/css" href="MemoryCSS.css">
</head>
<body>
    <table style="width:100%;position;center">
		<?php
			$nivel = $_GET["nivel"];
			$letras= 'A';
				echo "<tr><td colspan='$nivel'>Memory</td></tr>";
			for($i=0 ; $i< $nivel ; $i++){
				echo "<tr>";
				for($x=0 ; $x<$nivel ;$x++){
					echo "<th>";
					echo "$letras";
					echo "</th>";
					$letras++;
				}		
				echo "</tr>";
			}
		?>
		</table>
</body>
</html>

