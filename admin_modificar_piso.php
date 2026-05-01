<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["usuario_id"]) || $_SESSION["tipo"] != "administrador") {
    header("Location: login.php");
    exit();
}

$id = $_GET["id"];
$mensaje = "";

// Obtener datos del piso
$sql = "SELECT * FROM pisos WHERE Codigo_piso = $id";
$resultado = mysqli_query($conexion, $sql);
$piso = mysqli_fetch_assoc($resultado);

// Guardar cambios
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $calle = $_POST["calle"];
    $numero = $_POST["numero"];
    $piso_num = $_POST["piso"];
    $puerta = $_POST["puerta"];
    $cp = $_POST["cp"];
    $metros = $_POST["metros"];
    $zona = $_POST["zona"];
    $precio = $_POST["precio"];
    $imagen = $_POST["imagen"];

    $sql_update = "UPDATE pisos 
                   SET calle='$calle', numero=$numero, piso=$piso_num, puerta='$puerta',
                       cp=$cp, metros=$metros, zona='$zona', precio=$precio, imagen='$imagen'
                   WHERE Codigo_piso = $id";

    mysqli_query($conexion, $sql_update);

    $mensaje = "Piso modificado correctamente.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar piso</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Modificar piso</h1>

<form method="POST" class="formulario">

    <label>Calle:</label><br>
    <input type="text" name="calle" value="<?php echo $piso['calle']; ?>" required><br><br>

    <label>Número:</label><br>
    <input type="number" name="numero" value="<?php echo $piso['numero']; ?>" required><br><br>

    <label>Piso:</label><br>
    <input type="number" name="piso" value="<?php echo $piso['piso']; ?>" required><br><br>

    <label>Puerta:</label><br>
    <input type="text" name="puerta" value="<?php echo $piso['puerta']; ?>" required><br><br>

    <label>Código Postal:</label><br>
    <input type="number" name="cp" value="<?php echo $piso['cp']; ?>" required><br><br>

    <label>Metros:</label><br>
    <input type="number" name="metros" value="<?php echo $piso['metros']; ?>" required><br><br>

    <label>Zona:</label><br>
    <input type="text" name="zona" value="<?php echo $piso['zona']; ?>"><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" value="<?php echo $piso['precio']; ?>" required><br><br>

    <label>Imagen:</label><br>
    <input type="text" name="imagen" value="<?php echo $piso['imagen']; ?>" required><br><br>

    <input type="submit" value="Guardar cambios">
</form>

<p><?php echo $mensaje; ?></p>

<p><a href="admin_listar_pisos.php">Volver</a></p>

</body>
</html>
