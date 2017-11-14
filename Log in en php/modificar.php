<?php
session_start();
if(!isset($_SESSION["id_tipo"]) or $_SESSION["id_tipo"] == 1) {
    $error = "Acceso no autorizado";
    session_destroy();
    header("Location: ../index.php?error=$error");
}
$id = $_GET['id'];
require("php/conexion.php");

$conexion = pg_connect("host=$host port=$port dbname=$bd user=$user password=$password")or die("Error al conectar".pg_last_error());
$SQL = "SELECT * FROM usuarios WHERE id=$id";

$resultado = pg_query($conexion, $SQL) or die("Error");

$exito = pg_num_rows($resultado);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Modificar</title>
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
    </head>
    <body>
       <?php
        if ($exito > 0) {
            $fila = pg_fetch_array($resultado);
            $nombre = $fila['nombre'];
        ?>
        <h1 class="page-header">Modificar <?= $nombre ?></h1>
        <div>
            <form action="php/modify.php?id=<?=$id?>" method="post" class="form">
                <div class="form-group">
                    <label>ID: </label>
                    <label><?=$id?></label>
                </div>
                <div class="form-group">
                    <label for="User">Nombre de Usuario: </label>
                    <input type="text" name="User" id="User">
                </div>
                <div class="form-group">
                    <label for="pass">Contraseña: </label>
                    <input type="password" name="pass" id="pass">
                </div>
                <div class="form-group">
                    <label for="type">Tipo de Usuario (1.- Cliente, 2.- Empleado, 3.- Administrador): </label>
                    <input type="number" name="type" id="type" max="3" min="1">
                </div>
                <button type="submit" class="btn" id="<?=$id?>" name="<?=$id?>">Modificar</button>
                <a href="php/login.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
        <?php
        } else {
            echo "No se pudo modificar";
        }
        pg_free_result($resultado);
        pg_close($conexion);
        ?>
        <script src="js/jquery-ui-1.11.4/"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </body>
</html>