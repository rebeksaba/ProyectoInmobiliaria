<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET["id"])) {
    echo "No se ha seleccionado ningún piso.";
    exit();
}

$usuario_id = $_SESSION["usuario_id"];
$piso_id = $_GET["id"];

// Obtener el precio del piso
$sql_piso = "SELECT precio FROM pisos WHERE Codigo_piso = $piso_id";
$resultado = mysqli_query($conexion, $sql_piso);

if (mysqli_num_rows($resultado) == 0) {
    echo "El piso no existe.";
    exit();
}

$piso = mysqli_fetch_assoc($resultado);
$precio_final = $piso["precio"];

// Insertar la compra
$sql_compra = "INSERT INTO comprados (usuario_comprador, Codigo_piso, Precio_final)
               VALUES ($usuario_id, $piso_id, $precio_final)";

if (mysqli_query($conexion, $sql_compra)) {
    $mensaje = "Compra realizada correctamente.";
} else {
    $mensaje = "Error al realizar la compra: " . mysqli_error($conexion);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Compra realizada</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <h1><?php echo $mensaje; ?></h1>

    <p><a href="privado.php">Volver a la zona privada</a></p>
</body>
</html>
