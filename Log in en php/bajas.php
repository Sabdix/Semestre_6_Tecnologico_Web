<?php
session_start();

if(!isset($_SESSION["id_tipo"]) or $_SESSION["id_tipo"] == 1) {
    $error = "Acceso no autorizado";
    session_destroy();
    header("Location: index.php?error=$error");
}

$id = $_GET['id'];
include("php/conexion.php");
$conexion = pg_connect("host=$host port=$port user=$user password=$password dbname=$bd") or die("Error al conectar la base de datos:". pg_last_error());

$SQL = "SELECT * FROM usuarios WHERE id=$id";

$resultado = pg_query($conexion, $SQL) or die("Error");

$exito = pg_num_rows($resultado);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Bajas</title>
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        if ($exito > 0) {
            $fila = pg_fetch_array($resultado);
        ?>
        <h1 class="page-header">Bajas</h1>
        <label>ID = <?=$id?></label><br>
        <label>Nombre de Usuario = <?=$fila["nombre"]?></label><br>
        <label>Constraseña = <?=$fila["password"]?></label><br>
        <label>Tipo Empleado = <?=$fila["id_tipo"]?></label><br>
        <a href="php/delete.php?id=<?=$id?>" class="btn btn-danger">Eliminar</a>
        <a href="php/login.php" class="btn btn-danger">Cancelar</a>
        <?php
        } else {
            $error = "No se puede eliminar";
            header("Location: login.php?error=$error");
        }
        ?>
        <script src="js/jquery-ui-1.11.4/"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </body>
</html>