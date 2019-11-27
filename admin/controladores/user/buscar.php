<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../../../public/vista/login.php");
} elseif ($_SESSION['rol'] == 'admin') {
    header("Location: ../../vista/admin/index.php");
}
include '../../../config/conexionBD.php';

if ($_GET != '') {
    $sql = "SELECT * FROM reunion WHERE reu_motivo LIKE '" . $_GET['key'] . "%';";
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
            echo '<td><a onclick="openWindow(' . $row["reu_codigo"] . ')">Leer</a></td>';
            echo ('<div id="floatWindow" class="floatWindow"></div>');
            echo '<td><a onclick="openWindow(' . $row["reu_codigo"] . ')">Ver Lista</a></td>';
        }
    } else {
        echo "<tr>";
        echo '<td colspan="10" class="db_null"><p>No hay resultados...</p><i class="fas fa-exclamation-circle"></i></td>';
        echo "</tr>";
    }
} else {

}
$conn->close();