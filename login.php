<?php
session_start();
require_once "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];

    $sql = "SELECT * FROM usuario WHERE correo='$correo' AND clave='$clave'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);

        $_SESSION["usuario_id"] = $usuario["usuario_id"];
        $_SESSION["nombre"] = $usuario["nombres"];
        $_SESSION["tipo"] = $usuario["tipo_usuario"];

        header("Location: privado.php");
        exit();
    } else {
        $mensaje = "Correo o clave incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <h1>Iniciar sesión</h1>

    <form method="POST">
        <label>Correo:</label><br>
        <input type="email" name="correo" required><br><br>

        <label>Clave:</label><br>
        <input type="password" name="clave" required><br><br>

        <button type="submit">Entrar</button>
    </form>

    <p><?php echo $mensaje; ?></p>

    <p><a href="index.php">Volver</a></p>
</body>
</html>
