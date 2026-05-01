<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM pisos";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Zona privada</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION["nombre"]; ?></h1>

    <h2>Listado de pisos disponibles</h2>

    <?php while($fila = mysqli_fetch_assoc($resultado)): ?>
        <div style="border:1px solid #ccc; margin:10px; padding:10px;">
            <p><strong>Calle:</strong> <?php echo $fila['calle']; ?>, <?php echo $fila['numero']; ?></p>
            <p><strong>Precio:</strong> <?php echo $fila['precio']; ?> €</p>
            <p><strong>Metros:</strong> <?php echo $fila['metros']; ?> m2</p>

            <a href="comprar.php?id=<?php echo $fila['Codigo_piso']; ?>">
                Comprar piso
            </a>
        </div>
    <?php endwhile; ?>

    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
