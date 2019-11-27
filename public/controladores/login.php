<?php
session_start();
if (isset($_SESSION['isLogin'])) {
    header("Location: ../../admin/vista/usuario/index.php");
}

include '../../config/conexionBD.php';

$email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
$pass = isset($_POST["pass"]) ? trim($_POST["pass"]) : null;
$sql = "SELECT * FROM usuario WHERE usu_correo ='$email' AND usu_password = MD5('$pass')";

$result = $conn->query($sql);
$user = $result->fetch_assoc();
if ($result->num_rows > 0) {
    $_SESSION['isLogin'] = true;
    $_SESSION['codigo'] = $user["usu_codigo"];
    $_SESSION['nombre'] = $user["usu_nombres"];
    $_SESSION['apellido'] = $user["usu_apellidos"];
    $_SESSION['rol'] = $user["usu_rol"];
    if ($_SESSION['rol'] == 'admin') {
        header("Refresh:2; url=../../admin/vista/admin/index.php");
    } else {
        header("Refresh:2; url=../../admin/vista/usuario/index.php");
    }
    } else {
        header("Refresh:2; url=../vista/login.php");
    }
$conn->close();
?>