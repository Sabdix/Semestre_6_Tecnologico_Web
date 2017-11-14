<?php
session_start();

if(!isset($_SESSION["id_tipo"]) or $_SESSION["id_tipo"] == 1 or $_SESSION["id_tipo"] == 2) {
    $error = "Acceso no autorizado";
    header("Location: bienvenida.php?error=$error");
}

include("php/conexion.php");
$conexion = pg_connect("host=$host port=$port user=$user password=$password dbname=$bd") or die("Error al conectar la base de datos:". pg_last_error());

$SQL = "SELECT MAX(id) as maximo FROM usuarios";

$resultado = pg_query($conexion, $SQL) or die("Error");

$exito = pg_num_rows($resultado);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Altas</title>
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        if ($exito > 0) {
            $fila = pg_fetch_array($resultado);
        ?>
        <h1 class="page-header">Altas</h1>
        <div>
            <form action="php/add.php" method="post" class="form">
                <div class="form-group">
                    <label>ID: </label>
                    <label><?=$fila['maximo'] + 1?></label>
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
                <button type="submit" class="btn">Registrar</button>
            </form>
        </div>
        <?php
        } else {
        ?>
        <h1>Página Temporalmente No Disponible</h1>
        <?php
        }
        pg_free_result($resultado);
        pg_close($conexion);
        ?>
        <script src="js/jquery-ui-1.11.4/"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </body>
</html>