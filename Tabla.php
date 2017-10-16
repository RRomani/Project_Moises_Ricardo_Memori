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
        include"cartas.php";
        $nivel = $_GET["nivel"];
//			$aleatorio = [];			
//			for ($j=count($aleatorio) ; $j < ($nivel*$nivel)/2  ; $j++){
//				$numAle = random_int(0,($nivel*$nivel)/2);
//				if ($numAle == $aleatorio[$j])						
//					$aleatorio[]=$numAle;
//				print_r ($aleatorio[$j]);							
//			}
//			print_r($aleatorio);
        echo "<tr><td colspan='$nivel'>MeMemory <br> intentos: <span id='Control'> </span></td></tr>";
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
