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
			<h2><span>Registro</span></h2>
		</div>		
		<form class="form__reg" method="POST" onsubmit="return validarCamposObligatorios()" action="../controladores/crear_usuario.php" >
			<span class="error" id="errorCedula"></span>
			<input class="input" type="text" placeholder="&#128100;  Cédula"  autofocus name="cedula" id="cedula" onkeyup="validarNumeros(event,'errorCedula',this)">
			<span class="error" id="errorNombre"></span>
			<input class="input" type="text" placeholder="&#128100;  Nombres" name="nombre" id="nombre" onkeyup="validarLetras(event,'errorNombre',this)">
			<span class="error" id="errorApellico"></span>
			<input class="input" type="text" placeholder="&#128100;  Apellidos"  name="apellido" id="apellido" onkeyup="validarLetras(event,'errorNombre',this)" >
			<span class="error" id="errorDireccion"></span>
			<input class="input" type="text" placeholder="&#8962;  Dirección" name="direccion" id="direccion">
			<span class="error" id="errorTelefono"></span>
			<input class="input" type="text" placeholder="&#128222;  Telefono" name="telefono" id="telefono" onkeyup="validarNumeros(event,'errorTelefono',this)" >
			<span class="error" id="errorFechaNac"></span>
			<input class="input" type="text" placeholder="&#8962;  Fecha de nacimiento" name="fechaNac" id="fechaNac" onkeyup="validarFecha(event,'errorFechaNac',this)">
			<span class="error" id="errorEmail"></span>
			<input class="input" type="text" placeholder="&#9993;  Correo" name="email" id="email" onkeyup="validarCorreo('errorEmail',this)">
			<span class="error" id="errorPass"></span>
			<input class="input" type="password" placeholder="&#9993;  Contraseña" name="pass" id="pass" onkeyup="validar_clave('errorPass',this)" >
			<span class="error" id="errorCPass"></span>
			<input class="input" type="password" placeholder="&#9993;  Confirmar Contraseña" name="cpass" id="cpass" onkeyup="validarPass('errorCPass')" >
            <div class="btn__form">
            	<input class="btn__submit" type="submit" value="REGISTRAR">
			</div>
			<p><a href="login.php">Iniciar sesion</a></p>
		</form>
	</div>
</body>
</html>