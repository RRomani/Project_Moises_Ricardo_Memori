<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<head>
	<script type="text/javascript" src="Memoryjs.js"></script>
	<link rel="stylesheet" type="text/css" href="MemoryCSS.css">
</head>
<body>
    <table style="position;center">
		<?php
			$imagenes = [
				0 => 'trollface.jpg',
				1 => 'facepalm.png',
				2 => 'yaoming.jpg',
				3 => 'mentira.jpg',
				4 => 'megusta.jpeg',
				5 => 'what.jpg',
				6 => 'cereal.png',
				7 => 'fea.jpg',
				8 => 'mog.jpeg'];			
			$nivel = $_GET["nivel"];
//			$aleatorio = [];			
//			for ($j=count($aleatorio) ; $j < ($nivel*$nivel)/2  ; $j++){
//				$numAle = random_int(0,($nivel*$nivel)/2);
//				if ($numAle == $aleatorio[$j])						
//					$aleatorio[]=$numAle;
//				print_r ($aleatorio[$j]);							
//			}
//			print_r($aleatorio);
			echo "<tr><td colspan='$nivel'>MeMemory</td></tr>";
			for($i=0 ; $i< $nivel ; $i++){
				echo "<tr>";				
				for($x=0 ; $x<$nivel ;$x++){
					$numAle = random_int(0,($nivel*$nivel)/2);			
					echo "<td>
							<div class='flip-container' onclick='flip(event)'>
								<div class='flipper'>
									<div class='front'>
										<img src='imagenes/reverso.jpeg' ></img>
									</div>
									<div class='back'>
										<img src='imagenes/".$imagenes[$numAle]."'></img>
									</div>
								</div>
							</div>
						</td>";
				}		
				echo "</tr>";
			}
		?>
		</table>
		
	</body>
</html>

