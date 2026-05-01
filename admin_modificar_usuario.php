<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["usuario_id"]) || $_SESSION["tipo"] != "administrador") {
    header("Location: login.php");
    exit();
}

$id = $_GET["id"];
$mensaje = "";

// Obtener datos del usuario
$sql = "SELECT * FROM usuario WHERE usuario_id = $id";
$resultado = mysqli_query($conexion, $sql);
$usuario = mysqli_fetch_assoc($resultado);

// Guardar cambios
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $clave = $_POST["clave"];
    $tipo = $_POST["tipo"];

    $sql_update = "UPDATE usuario 
                   SET nombres='$nombre', correo='$correo', clave='$clave', tipo_usuario='$tipo'
                   WHERE usuario_id = $id";

    mysqli_query($conexion, $sql_update);

    $mensaje = "Usuario modificado correctamente.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Modificar usuario</h1>

<form method="POST" class="formulario">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?php echo $usuario['nombres']; ?>" required><br><br>

    <label>Correo:</label><br>
    <input type="email" name="correo" value="<?php echo $usuario['correo']; ?>" required><br><br>

    <label>Clave:</label><br>
    <input type="text" name="clave" value="<?php echo $usuario['clave']; ?>" required><br><br>

    <label>Tipo de usuario:</label><br>
    <select name="tipo">
        <option value="administrador" <?php if($usuario['tipo_usuario']=='administrador') echo 'selected'; ?>>Administrador</option>
        <option value="comprador" <?php if($usuario['tipo_usuario']=='comprador') echo 'selected'; ?>>Comprador</option>
        <option value="vendedor" <?php if($usuario['tipo_usuario']=='vendedor') echo 'selected'; ?>>Vendedor</option>
    </select><br><br>

    <input type="submit" value="Guardar cambios">
</form>

<p><?php echo $mensaje; ?></p>

<p><a href="admin_listar_usuarios.php">Volver</a></p>

</body>
</html>
