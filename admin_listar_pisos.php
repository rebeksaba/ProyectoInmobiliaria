<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["usuario_id"]) || $_SESSION["tipo"] != "administrador") {
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
    <title>Listar pisos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Listado de pisos</h1>

<table border="1" cellpadding="5">
    <tr>
        <th>Código</th>
        <th>Calle</th>
        <th>Número</th>
        <th>Piso</th>
        <th>Puerta</th>
        <th>CP</th>
        <th>Metros</th>
        <th>Zona</th>
        <th>Precio</th>
        <th>Acciones</th>
    </tr>

    <?php while($fila = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?php echo $fila["Codigo_piso"]; ?></td>
            <td><?php echo $fila["calle"]; ?></td>
            <td><?php echo $fila["numero"]; ?></td>
            <td><?php echo $fila["piso"]; ?></td>
            <td><?php echo $fila["puerta"]; ?></td>
            <td><?php echo $fila["cp"]; ?></td>
            <td><?php echo $fila["metros"]; ?></td>
            <td><?php echo $fila["zona"]; ?></td>
            <td><?php echo $fila["precio"]; ?></td>
            <td>
                <a href="admin_modificar_piso.php?id=<?php echo $fila['Codigo_piso']; ?>">Modificar</a> |
                <a href="admin_borrar_piso.php?id=<?php echo $fila['Codigo_piso']; ?>">Borrar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<p><a href="admin.php">Volver</a></p>

</body>
</html>
