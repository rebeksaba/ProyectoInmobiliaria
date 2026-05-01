<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION["usuario_id"];

$sql = "SELECT pisos.calle, pisos.numero, pisos.precio
        FROM comprados
        INNER JOIN pisos ON comprados.Codigo_piso = pisos.Codigo_piso
        WHERE comprados.usuario_comprador = $usuario";

$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mis compras</title>
</head>
<body>
    <h1>Mis pisos comprados</h1>

    <?php while($fila = mysqli_fetch_assoc($resultado)): ?>
        <div style="border:1px solid #ccc; margin:10px; padding:10px;">
            <p><strong>Calle:</strong> <?php echo $fila["calle"]; ?></p>
            <p><strong>Número:</strong> <?php echo $fila["numero"]; ?></p>
            <p><strong>Precio final:</strong> <?php echo $fila["precio"]; ?> €</p>
        </div>
    <?php endwhile; ?>

    <p><a href="privado.php">Volver</a></p>
</body>
</html>
