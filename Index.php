<?php 
	session_start();
	
 ?>
<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<head>
	<script type="text/javascript" src="js/Memoryjs.js"></script>
	<link rel="stylesheet" type="text/css" href="css/MemoryCSS.css">
</head>
<body background="imagenes/general.png" style="background-size: 100%;background-repeat: no-repeat;">
	<?php 
	echo "<div class='general'>
		<div id='formulario'>
			<h1>Formulario MEMEmory</h1>
			<form action='php/Tabla.php' method='post' >
				<strong>Nombre: </strong>
				<input type='text' name='nombre'  />
				<br>
				<strong>Nivel: </strong>&nbsp; &nbsp; &nbsp;
				<select name='nivel' id='lvl' >
					<option value='4'>4x4</option>
					<option value='6'>6x6</option>
					<option value='8'>8x8</option>
				</select>
				<input type='submit' value='Empezar' style='margin: 10px auto'/>
				<input type='button' value='Ver Ranking' onclick='location=Puntuacion.php' style='margin: 10px auto'>
			</form>
		</div>
	</div>";
	 ?>
</body>
</html>
