<?php
session_start();

if (!isset($_SESSION["usuario_id"]) || $_SESSION["tipo"] != "vendedor") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Zona vendedor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Zona del vendedor</h1>

<p><a href="vendedor_alta_piso.php">Dar de alta un piso</a></p>
<p><a href="vendedor_mis_pisos.php">Mis pisos dados de alta</a></p>

<p><a href="logout.php">Cerrar sesión</a></p>

</body>
</html>
