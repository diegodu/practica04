<
<div class="menu">
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="newmail.php">Nueva Reunion</a></li>
            <li><a href="sendmail.php">Mis Reuniones</a></li>
            <li><a href="myaccount.php">Mi Cuenta</a></li>
            <li><a href="../../../config/sessionEnd.php">Cerrar Sesion</a></li>
        </ul>
    </nav>
</div>
<div class="user">
    <div class="userImg">
        <p><span><?php echo ($_SESSION['nombre'] . ' ' . $_SESSION['apellido']) ?></span></p>
    </div>
</div>