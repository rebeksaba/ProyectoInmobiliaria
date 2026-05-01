<?php
session_start();
require_once "conexion.php";

$sql = "SELECT * FROM pisos";
$resultado = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inmobiliaria</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <h1>Listado de pisos (público)</h1>

    <?php while($fila = mysqli_fetch_assoc($resultado)): ?>
        <div class="piso">
            <p><strong>Calle:</strong> <?php echo $fila['calle']; ?>, <?php echo $fila['numero']; ?></p>
            <p><strong>Precio:</strong> <?php echo $fila['precio']; ?> €</p>
            <p><strong>Metros:</strong> <?php echo $fila['metros']; ?> m2</p>
        </div>
    <?php endwhile; ?>


    <p>
        <a href="login.php">Login</a> |
        <a href="registro.php">Registro</a>
    </p>
</body>
</html>
