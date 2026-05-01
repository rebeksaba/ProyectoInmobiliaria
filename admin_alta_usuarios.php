<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["usuario_id"]) || $_SESSION["tipo"] != "administrador") {
    header("Location: login.php");
    exit();
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $tipo = $_POST["tipo"];

    $sql = "INSERT INTO usuario (nombres, correo, clave, tipo_usuario)
            VALUES ('$nombre', '$correo', '$clave', '$tipo')";

    mysqli_query($conexion, $sql);

    $mensaje = "Usuario creado correctamente.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alta usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Alta de usuario</h1>

<form method="POST" class="formulario">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Correo:</label><br>
    <input type="email" name="correo" required><br><br>

    <label>Clave:</label><br>
    <input type="password" name="clave" required><br><br>

    <label>Tipo de usuario:</label><br>
    <select name="tipo">
        <option value="administrador">Administrador</option>
        <option value="comprador">Comprador</option>
        <option value="vendedor">Vendedor</option>
    </select><br><br>

    <input type="submit" value="Crear usuario">
</form>

<p><?php echo $mensaje; ?></p>

<p><a href="admin.php">Volver</a></p>

</body>
</html>
