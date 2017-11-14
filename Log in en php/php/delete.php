<?php
session_start();
if(!isset($_SESSION["id_tipo"]) or $_SESSION["id_tipo"] == 1) {
    $error = "Acceso no autorizado";
    session_destroy();
    header("Location: ../index.php?error=$error");
}
$id = $_GET['id'];

include("conexion.php");
$conexion = pg_connect("host=$host port=$port user=$user password=$password dbname=$bd") or die("Error al conectar la base de datos:". pg_last_error());

$SQL = "DELETE FROM usuarios WHERE id=$id";

$resultado = pg_query($conexion, $SQL) or die("Error");

if ($resultado == "Error") {
    $error = "No se pudo eliminar";
    header("Location: login.php?error=$error");
} else {
    pg_free_result($resultado);
    pg_close($conexion);
    header("Location: login.php");
}


?>