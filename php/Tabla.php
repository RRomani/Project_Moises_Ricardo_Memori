<!DOCTYPE html>
<html>
<meta charset="utf-8" />

<head>
	<script type="text/javascript" src="../js/Memoryjs.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/MemoryCSS.css">
</head>

<body background="../imagenes/general.png" style="background-size: 100%;background-repeat: no-repeat;">
	<div class="general">
		<table style="position;center">
			<?php
            //incluimos un php con el array de cartas
			include "cartas.php";

			$cont=0;   
			$nivel = $_POST["nivel"];
            $nombre = $_POST["nombre"];

        //Creamos un array vacio para guardar las cartas
			$aleatorio=[];		
        //Guardamos el numero de cartas que necesitemos en el array que acabamos de crear
			for ($j=0 ; $j < ($nivel*$nivel)/2  ; $j++){
				$aleatorio[] = $imagenes[$j];			
				$aleatorio[] = $imagenes[$j];				
			}
        //Utilizamos la funcion de shuffle para mover el array de manera que desordenaremos las cartas
			shuffle($aleatorio);
        //Creamos el titulo  y el tablero, para assignar la imagen tenemos un contador que nos indicara que imagen del array mostrar
			echo "<thead><tr><td id='titulo' colspan='$nivel'>MeMemory <br> Intentos: <span id='Control'> </span></td></tr></thead>";
			for($i=0 ; $i< $nivel ; $i++){
				echo "<tr>";				
				for($x=0 ; $x<$nivel ;$x++){
					echo "<td>
							<div class='flip-container' onclick='flip(event)'>
								<div class='flipper'>
						              <div class='front'><img src='../imagenes/reverso.jpeg'></img></div>
				                      <div class='back' id='".$aleatorio[$cont]."'><img src='../imagenes/".$aleatorio[$cont]."'></img></div>
								</div>
							</div>
						</td>";
                $cont++;
				}		
				echo "</tr>";
			}
    
        echo "</table>
            <form action='Ranking.php' method='POST' id='restart' style='display:block'>
           		<input type='text' id='nombreJugador' name='nombre' value='".$nombre."'>
                <input type='text' id='puntuacion' name='puntuacion'>
                <button type='submit' id='Ranking' player='$nombre'>Volver a empezar!</button>
            </form>";
		?>
</body>

</html>
