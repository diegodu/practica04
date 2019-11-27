<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    header("Location: ../../vista/admin/index.php");
}
include '../../../config/conexionBD.php';

$sql = "SELECT * FROM reunion WHERE reu_codigo = 2 ;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo ('<div class="formulario window">
    <p><span>Motivo: </span>' . $row["reu_motivo"] . '</p>
    <p> <span>Observaciones: </span>' . $row["reu_observaciones"] . '</p>
    <input type="button" value="Cerrar" onclick="cluseWindow()">
</div>');