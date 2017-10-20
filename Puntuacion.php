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
                        $array = array();
                        while (!feof($archivo)) {
		       			    $linea = fgets($archivo);
                            if (!empty($array)){
                                $index = strrpos($linea, "-");
                                $nombre = substr($linea,0,$index);
                                $puntuacion = (int) substr ($linea ,$index + 1);
                                $array = array($nombre, $puntuacion);
                            }
                        }
                    
                    echo "Nombre: '.$array[0].'    -   Puntuación:'.$array[1].'";
                    }
		         	

				?>
</body>

</html>
