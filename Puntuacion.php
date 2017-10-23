<!DOCTYPE html>
<html>
<meta charset="utf-8" />

<head>
    <script type="text/javascript" src="js/Memoryjs.js"></script>
    <link rel="stylesheet" type="text/css" href="css/MemoryCSS.css">
</head>

<body background="imagenes/general.png" style="background-size: 100%;background-repeat: no-repeat;">
    <div class="general">
        <div id="formulario">
            <h1>Formulario MEMEmory</h1>
            <?php
		       		if ($archivo = fopen("ranking/ranking", "r")){
                        $array[]= array();
                        while (!feof($archivo)) {
		       			    $linea = fgets($archivo);
                            if (!empty($linea)){
                                $index = strrpos($linea, "-");
                                $nombre = substr($linea,0,$index);
                                $puntuacion = (int) substr ($linea ,$index + 1);
                                $array[] = array($nombre, $puntuacion);
                            }
                        }
                        
                        
                        for($i = 1; $i < count($array); $i++){
                            for($j = 0; $j < count($array) - $i; $j++){
                                if ($array[$j] != null){
                                if($array[$j][1]>$array[$j+1][1]){
                                    $k=$array[$j+1];
					                $array[$j+1]=$array[$j];
					                $array[$j] = $k;
                                    }
                                }
                            }
                        }
                        
                        foreach($array as $registros){
                            if (!empty($registros[0])){
                                echo "Nombre: ".$registros[0]."    -   Puntuación: ".$registros[1]."<br>";
                                }
                            }
                    }
				?>
				<input type="button" value="Volver" onclick="location='Index.html'">
</body>

</html>
