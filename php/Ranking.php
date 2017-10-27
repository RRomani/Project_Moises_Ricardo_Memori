<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['nombre']) && !empty($_POST['puntuacion'])){
		$nombre_archivo = "ranking";
 
		if($archivo = fopen("../ranking/".$nombre_archivo, "a")){
			echo "Abre archivo";
			if(fwrite($archivo, $_POST['nombre']. "-".$_POST['puntuacion']. "\n")){
				fclose($archivo);
				header("Location: ../Index.html");
			}else{
				echo "No se ha podido escribir en el fichero.";
                header("Location: ../Index.html");
			}
		}else{
			echo "No se ha podido abrir el fichero.";
            header("Location: ../Index.html");
		}
		fclose($archivo);
		
	}else{
		header("Location: ../Index.html");
	}
?>