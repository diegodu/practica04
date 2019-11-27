<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    header("Location: ../../vista/usuario/index.php");
}

include '../../../config/conexionBD.php';
$cod = isset($_GET["reu_codigo"]) ? trim($_GET["reu_codigo"]) : null;
$sql = "DELETE FROM reunion WHERE reu_codigo='$cod';";
if ($conn->query($sql) == true) {
    header("Location: ../../vista/admin/index.php");
}
$conn->close();