<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    header("Location: ../../admin/vista/usuario/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
	<link rel="stylesheet" href="../../css/estilosFormulario.css">
	<script type="text/javascript" src="../../config/validarFormulario.js"></script>
	<title>Formulario</title>
</head>
<body>
	<div class="container">
		<div class="form__top">
			<h2><span>Inicio</span></h2>
		</div>		
		<form class="form__reg" method="POST"  action="../controladores/login.php" >
			<span class="error" id="errorEmail"></span>
			<input class="email" type="text" placeholder="&#9993;  Correo" name="email" id="email" onkeyup="validarCorreo('errorEmail',this)">
			<span class="error" id="errorPass"></span>
			<input class="input" type="password" placeholder="&#9993;  Contraseña" name="pass" id="pass">
            <div class="btn__form">
            	<input class="btn__submit" type="submit" value="INICIAR SESION">
			</div>
			<p><a href="crear_usuario.php">Crear Cuenta</a></p>
		</form>
	</div>
</body>
</html>