<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'user') {
    header("Location: ../usuario/index.php");
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
    <title>Administrar Usuarios</title>
</head>

<body>
    <header>
        <?php
        include('../../../php/headerAdmin.php');
        ?>
    </header>
    <div id="contenedor">
        <h2>REUNIONES</h2>
        <section>
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
                        <td>Eliminar</td>
                        <td>Asistentes</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../../../config/conexionBD.php';
                    $sql = "SELECT * FROM reunion order by reu_fecha DESC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo " <td>" . $row["reu_fecha"] . "</td>";
                            echo " <td>" . $row["reu_hora"] . "</td>";
                            echo " <td>" . $row["reu_lugar"] . "</td>";
                            echo " <td>" . $row['reu_motivo'] . "</td>";
                            echo " <td>" . $row['reu_observaciones'] . "</td>";
                            echo " <td>" . $row['reu_latitud'] . "</td>";
                            echo " <td>" . $row['reu_longitud'] . "</td>";
                            echo '<td><a href="../../controladores/admin/deleteMSJ.php?reu_codigo=' . $row["reu_codigo"] . '">Eliminar</a></td>';
                            echo '<td><a href="../../controladores/admin/deleteMSJ.php?reu_codigo=' . $row["reu_codigo"] . '">Asistentes</a></td>';
                        }
                    } else {
                        echo "<tr>";
                        echo '<td colspan="10" class="db_null"><p>No tienes mensajes recibidos</p><i class="fas fa-exclamation-circle"></i></td>';
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