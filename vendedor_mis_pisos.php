<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["usuario_id"]) || $_SESSION["tipo"] != "vendedor") {
    header("Location: login.php");
    exit();
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $codigo = $_POST["codigo"];
    $calle = $_POST["calle"];
    $numero = $_POST["numero"];
    $piso = $_POST["piso"];
    $puerta = $_POST["puerta"];
    $cp = $_POST["cp"];
    $metros = $_POST["metros"];
    $zona = $_POST["zona"];
    $precio = $_POST["precio"];
    $imagen = $_POST["imagen"];

    $vendedor = $_SESSION["usuario_id"];

    $sql = "INSERT INTO pisos (Codigo_piso, calle, numero, piso, puerta, cp, metros, zona, precio, imagen, usuario_id)
            VALUES ($codigo, '$calle', $numero, $piso, '$puerta', $cp, $metros, '$zona', $precio, '$imagen', $vendedor)";

    mysqli_query($conexion, $sql);

    $mensaje = "Piso creado correctamente.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alta piso vendedor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Dar de alta un piso</h1>

<form method="POST" class="formulario">

    <label>Código:</label><br>
    <input type="number" name="codigo" required><br><br>

    <label>Calle:</label><br>
    <input type="text" name="calle" required><br><br>

    <label>Número:</label><br>
    <input type="number" name="numero" required><br><br>

    <label>Piso:</label><br>
    <input type="number" name="piso" required><br><br>

    <label>Puerta:</label><br>
    <input type="text" name="puerta" required><br><br>

    <label>Código Postal:</label><br>
    <input type="number" name="cp" required><br><br>

    <label>Metros:</label><br>
    <input type="number" name="metros" required><br><br>

    <label>Zona:</label><br>
    <input type="text" name="zona"><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" required><br><br>

    <label>Imagen:</label><br>
    <input type="text" name="imagen" required><br><br>

    <input type="submit" value="Crear piso">
</form>

<p><?php echo $mensaje; ?></p>

<p><a href="vendedor.php">Volver</a></p>

</body>
</html>
