<?php
    session_start();
?>
    <!DOCTYPE html>
    <html>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <head>
        <script type="text/javascript" src="../js/Memoryjs.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/MemoryCSS.css">
    </head>

    <body background="../imagenes/general.png" style="background-size: 100%;background-repeat: no-repeat;" onload="inicializar()">
        <div class="general">
            <table style="position;center">
                <?php
            //incluimos un php con el array de cartas
			include "cartas.php";

            if(!isset($_SESSION['aleatorio'])){
                if (!empty($_POST['nombre'])){  
                    if(!empty($_POST['nivel'])){  
                            $_SESSION['nombre'] = $_POST['nombre'];
                            $_SESSION['nivel'] = $_POST['nivel'];
                            
                            $aleatorio = [];                        
                            //Guardamos el numero de cartas que necesitemos en el array que acabamos de crear
                            for ($j=0 ; $j < ($_POST['nivel']*$_POST['nivel'])/2  ; $j++){
                                $aleatorio[] = $imagenes[$j];			
                                $aleatorio[] = $imagenes[$j];				
                            }
                            //Utilizamos la funcion de shuffle para mover el array de manera que desordenaremos las cartas
                            shuffle($aleatorio);
                            $_SESSION['aleatorio'] = $aleatorio;
                            
                        header("Location: Tabla.php");
                        }else{
                            echo "<h2>Fallo al recoger el nivel</h2>"; 
                        }
                    }else{
                        echo "<h2>Fallo al recoger el nombre</h2>";    
                    }
            }else{
                
                $cont=0; 
                $nivel = $_SESSION['nivel'];
                $nombre = $_SESSION['nombre'];
                
                //Creamos un array vacio para guardar las cartas
                foreach($_SESSION['aleatorio'] as $key =>$value){
                    $aleatorio[] = $value;
                }
                //Creamos el titulo  y el tablero, para assignar la imagen tenemos un contador que nos indicara que imagen del array mostrar
                
                //Creamos el titulo  y el tablero, para assignar la imagen tenemos un contador que nos indicara que imagen del array mostrar
            
                echo "<thead><tr><td id='titulo' colspan='$nivel'>MeMemory</td></tr></thead>";
            echo "<div id='contenedorIntentos'>
                Intentos: <span id='Control'></span>
            </div><br><br>
            <div id='contenedorTiming'>
                Timing: <span id='my_timer'>00:00</span>
            </div>";      
                for($i=0 ; $i< $nivel ; $i++){
                    echo "<tr>";				
                    for($x=0 ; $x<$nivel ;$x++){
                        echo "<td>
                                <div class='flip-container' id='".$aleatorio[$cont]."' onclick='flip(event)'>
                                    <div class='flipper'>
                                          <div class='front'><img src='../imagenes/reverso.jpeg'></img></div>
                                          <div class='back'><img src='../imagenes/".$aleatorio[$cont]."'></img></div>
                                    </div>
                                </div>
                            </td>";
                    $cont++;
                    }		
                    echo "</tr>";
                }
                echo "<audio id='audio' autoplay='false' style='diplay:none'></audio>";
                echo "</table>
                    <form action='Ranking.php' method='POST' id='restart' style='display:none'>
                        <input type='text' style='display:none' id='nombreJugador' name='nombre' value='".$nombre."'>
                        <input type='text' style='display:none' id='puntuacion' name='puntuacion'>
                        <button type='submit' id='Ranking' player='$nombre'>Volver a empezar!</button>
                    </form>";
            }
		?>
            </table>

        </div>
    </body>

    </html>
