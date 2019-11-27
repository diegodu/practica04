<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    header("Location: ../admin/index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/admin_style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="js/search.js"></script>
    <title>Inicio</title>
</head>

<body>
    <header>
        <?php
        include('../../../php/headerUser.php');
        ?>
    </header>
    <div id="contenedor">
        <h2>Ultimas Reuniones</h2>
        <section>
            <div class="buscar">
                <input type="search" id="buscarRemitente" placeholder="Buscar por motivo"
                    onkeyup="buscar(this, 'index')">
            </div>
            <table>
                <thead>
                    <tr>
                        <td>Fecha</td>
                        <td>Hora</td>
                        <td>Lugar</td>
                        <td>Motivo</td>
                        <td>Observaciones</td>
                        <td>Latitud</td>
                        <td>Longitud</td>
                        <td>Observaciones</td>
                        <td>Asistentes</td>
                    </tr>
                </thead>
                <tbody id="data">
                    <?php
                    include '../../../config/conexionBD.php';

                    $sql1 = "SELECT * FROM reunion order by reu_fecha DESC";
                    $result1 = $conn->query($sql1);
            
                    if ($result1->num_rows > 0) {
            
                        echo "<h3>Reuniones</h3>";
                        while ($row1 = $result1->fetch_assoc()) {
                            
                            echo "<tr>";
                            echo " <td>" . $row1["reu_fecha"] . "</td>";
                            echo " <td>" . $row1["reu_hora"] . "</td>";
                            echo " <td>" . $row1["reu_lugar"] . "</td>";
                            echo " <td>" . $row1['reu_motivo'] . "</td>";
                            echo " <td>" . $row1['reu_observaciones'] . "</td>";
                            echo " <td>" . $row1['reu_latitud'] . "</td>";
                            echo " <td>" . $row1['reu_longitud'] . "</td>";
                            echo ('<div id="floatWindow" class="floatWindow"></div>');
                            echo '<td><a onclick="openWindow(' . $row1["reu_codigo"] . ')">Leer</a></td>';
                            echo ('<div id="floatWindow" class="floatWindow"></div>');
                            echo '<td><a onclick="openWindow(' . $row1["reu_codigo"] . ')">Leer</a></td>';
                        }
                    } else {
                        echo "<tr>";
                        echo " <td colspan='9'> No existen reuniones registradas en el sistema </td>";
                        echo "</tr>";
                    }
                    $conn->close();
                    ?>


                </tbody>
            </table>

        </section>
    </div>
</body>
</html>