<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<head>
	<script type="text/javascript" src="Memoryjs.js"></script>
	<link rel="stylesheet" type="text/css" href="MemoryCSS.css">
</head>
<body>
    <table style="position;center">
		
		<p id = "Control"></p>
		<?php
			$nivel = $_GET["nivel"];
				echo "<tr><td colspan='$nivel'>MeMemory</td></tr>";
			for($i=0 ; $i< $nivel ; $i++){
				//echo "<script>alert('hola')</script>;";
				echo "<tr>";
				for($x=0 ; $x<$nivel ;$x++){
					echo "<td>";
		?>
		<div class="flip-container" onclick="flip(event)">
			<div class="flipper">
				<div class="front">
					<img src="imagenes/reverso.jpeg" ></img>
				</div>
				<div class="back">
					<img src="imagenes/trollface.jpg"></img>
				</div>
			</div>
		</div>
		<?php
					echo "</td>";
				}		
				echo "</tr>";
			}
		?>
		</table>
	</body>
</html>

