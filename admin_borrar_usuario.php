<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["usuario_id"]) || $_SESSION["tipo"] != "administrador") {
    header("Location: login.php");
    exit();
}

$id = $_GET["id"];

$sql = "DELETE FROM usuario WHERE usuario_id = $id";
mysqli_query($conexion, $sql);

header("Location: admin_listar_usuarios.php");
exit();
?>
