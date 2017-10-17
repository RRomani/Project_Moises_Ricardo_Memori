<!DOCTYPE html>
<html>
<meta charset="utf-8" />

<head>
    <script type="text/javascript" src="Memoryjs.js"></script>
    <link rel="stylesheet" type="text/css" href="MemoryCSS.css">
</head>

<body>
    <table style="position;center">
        <?php
            $cont=0;   
			$nivel = $_GET["nivel"];
			$imagenes = [
				'trollface.jpg',
				'facepalm.png',
				'yaoming.jpg',
				'mentira.jpg',
				'megusta.jpeg',
				'what.jpg',
				'cereal.png',
				'fea.jpg',
                'pukerain.jpg',
                'whynot.png',
                'pokerface.png',
                'lol.jpg',
                'migusta.png',
                'nth.jpg',
                'chacc.jpg',
                'no.jpg',
                'normal.png',
                'jackie.jpg'];
			$aleatorio=[];		
			for ($j=0 ; $j < ($nivel*$nivel)/2  ; $j++){					
				$aleatorio[] = $imagenes[$j];									
				$aleatorio[] = $imagenes[$j];				
			}
            shuffle($aleatorio);
			echo "<tr><td id='titulo' colspan='$nivel'>MeMemory <br> Intentos: <span id='Control'> </span></td></tr>";
			for($i=0 ; $i< $nivel ; $i++){
				echo "<tr>";				
				for($x=0 ; $x<$nivel ;$x++){
					echo "<td>
							<div class='flip-container' onclick='flip(event)'>
								<div class='flipper'>
						              <div class='front'><img src='imagenes/reverso.jpeg'></img></div>
				                      <div class='back' id='".$aleatorio[$cont]."'><img src='imagenes/".$aleatorio[$cont]."'></img></div>
								</div>
							</div>
						</td>";
                $cont++;
				}		
				echo "</tr>";
			}
		?>
    </table>
    <form action="Formulario.php" id="restart" style="display:none">
        <button type="submit">Volver a empezar!</button>
    </form>
    
</body>

</html>
