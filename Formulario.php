<!DOCTYPE html>
<html>
	<meta charset="utf-8"/>
	<head>
		<script type="text/javascript" src="Memoryjs.js"></script>
		<link rel="stylesheet" type="text/css" href="MemoryCSS.css">
	</head>
	<body>
		<h1>Formulario MeMemory</h1>
		<form action="Tabla.php" method="GET">
			<strong>Nivel: </strong>
			<select name="nivel">
				<option hidden>Selecciona...</option>
				<option value="4">4x4</option>
				<option value="6">6x6</option>
				<option value="8">8x8</option>
			</select>
			<input type="submit" value="Empezar"/>
		</form>
	</body>
</html>
