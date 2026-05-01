<?php
require_once "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];

    $tipo = $_POST["tipo_usuario"];

        $sql = "INSERT INTO usuario (nombres, correo, clave, tipo_usuario)
            VALUES ('$nombre', '$correo', '$clave', '$tipo')";


    if (mysqli_query($conexion, $sql)) {
        $mensaje = "Usuario registrado correctamente.";
    } else {
        $mensaje = "Error: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <h1>Registro de usuario</h1>

    <form method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Correo:</label><br>
        <input type="email" name="correo" required><br><br>

        <label>Clave:</label><br>
        <input type="password" name="clave" required><br><br>

        <label>Tipo de usuario:</label><br>
        <select name="tipo_usuario">
            <option value="comprador">Comprador</option>
            <option value="vendedor">Vendedor</option>
        </select>
        <br><br>


        <button type="submit">Registrarse</button>
    </form>

    <p><?php echo $mensaje; ?></p>

    <p><a href="index.php">Volver</a></p>
</body>
</html>
