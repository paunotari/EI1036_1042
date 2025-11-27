<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Portal Pruebas </title>
	<meta name="Author" content="AlumnoXXX">
	<link rel="stylesheet" href="./css/estilo0.css" type="text/css">
	<link rel="ico" type="image/ico" href="./media/imagen2.ico"> 

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bitcount+Prop+Single+Ink:wght@100..900&family=Zalando+Sans:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">

	<!--Script para leer cookie y determinar tipo de user -> cambiar color web -->
	<script>
		document.addEventListener("DOMContentLoaded", function() {
		// función para obtener cookies
		function getCookie(name) {
			const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
			return match ? match[2] : null;
		}

		const tipo = getCookie("tipoUsuario");

		if (tipo === "admin") {
			document.body.style.backgroundColor = "#ffebcc";
			document.querySelector("nav").style.backgroundColor = "#ffcc80";
		}
		else if (tipo === "visitante") {
			document.body.style.backgroundColor = "#e0f7fa";
			document.querySelector("nav").style.backgroundColor = "#4dd0e1";
		}
});
</script>
</head>


<body>
	<header>
		<img src="./media/imagen2.png" id="logo" alt="logo" />
		<h1 id="eslogan"> Mi primer portal</h1>
	</header>
</body>