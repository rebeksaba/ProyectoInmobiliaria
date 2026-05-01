<?php
session_start();

if (!isset($_SESSION["usuario_id"]) || $_SESSION["tipo"] != "administrador") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panel de administración</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Panel de administración</h1>

<h2>Gestión de usuarios</h2>
<p>
    <a href="admin_listar_usuarios.php">Listar usuarios</a> |
    <a href="admin_alta_usuario.php">Alta usuario</a>
</p>

<h2>Gestión de pisos</h2>
<p>
    <a href="admin_listar_pisos.php">Listar pisos</a> |
    <a href="admin_alta_piso.php">Alta piso</a>
</p>

<p><a href="logout.php">Cerrar sesión</a></p>

</body>
</html>
