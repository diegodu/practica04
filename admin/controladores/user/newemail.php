<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    header("Location: ../../vista/admin/index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Reunion Creada</title>
</head>

<body>
    <header>
        <h1 class="tittle">Gestion de usuarios</h1>
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="../../vista/usuario/index.php">Inicio</a></li>
                    <li><a href="../../vista/usuario/newmail.php">Nuevo Mensaje</a></li>
                    <li><a href="../../vista/usuario/sendmail.php">Mensajes Enviados</a></li>
                    <li><a href="../../vista/usuario/myaccount.php">Mi Cuenta</a></li>
                    <li><a href="../../../config/sessionEnd.php">Cerrar Sesion</a></li>
                </ul>
            </nav>
        </div>
        <div class="user">
            <div class="userImg">
                <p><span><?php echo ($_SESSION['nombre'] . ' ' . $_SESSION['apellido']) ?></span></p>
            </div>
        </div>
    </header>
    <section>

        <div class="formulario crear_usuario">

            <?php
            include '../../../config/conexionBD.php';
            $codigoRemitente = isset($_POST["codigoRemitente"]) ? trim($_POST["codigoRemitente"]) : null;
            $emailDestino = isset($_POST["emailDestino"]) ? trim($_POST["emailDestino"]) : null;
            $motivo = isset($_POST["motivo"]) ? trim($_POST["motivo"]): null;
            $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]): null;
            $hora = isset($_POST["hora"]) ? trim($_POST["hora"]) : null;
            $lugar = isset($_POST["lugar"]) ? trim($_POST["lugar"]) : null;
            $latitud = isset($_POST["Latidud"]) ? trim($_POST["Latidud"]): null;
            $longitud = isset($_POST["Longitud"]) ? trim($_POST["Longitud"]): null;
            $observaciones = isset($_POST["observaciones"]) ? trim($_POST["observaciones"]) : null;

 $sql = "INSERT INTO reunion VALUES (0,'$codigoRemitente', '$fecha', '$hora', '$lugar', '$motivo', '$observaciones',
'$longitud',  '$latitud')";

 if ($conn->query($sql) === TRUE) {
        header("Location: ../../vista/usuario/index.php");
 } else {
 
 echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
 
 }

 //cerrar la base de datos
 $conn->close();
 









            if ($conn->query($sqlInsert) == true) {
                echo "<h2>Mensaje enviado con exito</h2>";
                echo '<i class="far fa-check-circle"></i>';
                echo '<a href="../../vista/usuario/sendmail.php">Regresar</a>';
            } else {

                echo "<h2>Error al enviar el mensaje: " . mysqli_error($conn) . "</h2>";
                echo '<i class="fas fa-exclamation-circle"></i>';
                echo '<a href="../../vista/usuario/newmail.php">Regresar</a>';
            }
            $conn->close();

            ?>

        </div>

</body>

</html>