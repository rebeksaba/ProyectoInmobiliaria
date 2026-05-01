<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Zona privada</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION["nombre"]; ?></h1>

    <p>Has iniciado sesión correctamente.</p>

    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
