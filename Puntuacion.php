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
                    $array[] = array();
                    while (!feof($archivo)) {
                        $linea = fgets($archivo);
                        if (!empty($array) || $nombre == null){
                            $index = strrpos($linea, "-");
                            $nombre = substr($linea,0,$index);
                            $puntuacion = (int) substr ($linea ,$index + 1);
                            $array []= array($nombre, $puntuacion);
                        }
                    }
                    print_r(array_sort(array, 'Puntuacion', SORT_DESC));
                    foreach ($array as $registro) {
                        if (!empty($registro[0])){
                            echo "Nombre: ".$registro[0]."    -   Puntuación:".$registro[1]."<br>";
                        }
                    }
                }
            ?>
</body>

</html>