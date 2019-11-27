<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    header("Location: ../../admin/vista/usuario/index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
    .error{
        color:red;
    }
    </style>
</head>
<body>
<?php
include '../../config/conexionBD.php';
$cedula=isset($_POST["cedula"]) ? trim($_POST["cedula"]):null;
$nombres=isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]),'UTF-8'):null;
$apellidos=isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]),'UTF-8'):null;
$direccion=isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]),'UTF-8'):null;
$telefono=isset($_POST["telefono"]) ? trim($_POST["telefono"]):null;
$correo=isset($_POST["email"]) ? trim($_POST["email"]):null;
$fechaNacimiento=isset($_POST["fechaNac"]) ? trim($_POST["fechaNac"]):null;
$contrasena=isset($_POST["pass"]) ? trim($_POST["pass"]):null;
$sql="INSERT INTO usuario VALUES (0,'user','$cedula','$nombres','$apellidos','$direccion','$telefono','$correo',MD5('$contrasena'),'$fechaNacimiento','N',null,null)";
if($conn->query($sql)==TRUE){
    //echo '<p>Se ha creado los datos personales correctament!!!</p>';
    header("Location:../../admin/vista/usuario/index.php");
}else{
    if($conn->errno==1062){
        echo '<p>Error!!!</p>';    
    }else{
        echo "<p class='error'>" .mysqli_error($conn). "/p>";
    }
}

$conn->close();
echo "<a href=>";
?>  
</body>
</html>