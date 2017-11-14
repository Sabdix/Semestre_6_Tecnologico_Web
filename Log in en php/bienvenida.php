<?php
session_start();

if(!isset($_SESSION["id_tipo"])) {
    $error = "Acceso no autorizado";
    header("Location: index.php?error=$error");
}
$id_tipo = $_SESSION["id_tipo"];
$cadena = "<ul>";
$nombre = $_SESSION["nombre"];

switch($id_tipo) {
    case 1: //Cliente
        $cadena.="<li><a href='php/login.php'>Consultas</a></li>";
        $cadena.="<li><a href='php/cerrar.php'>Cerrar Sesión</a></li>";
        break;
    case 2: //Empleado
        $cadena.="<li><a href='php/login.php'>Consultas</a></li>";
        $cadena.="<li><a href='php/cerrar.php'>Cerrar Sesión</a></li>";
        break;
    case 3: //Administrador
        $cadena.="<li><a href='php/login.php'>Consultas</a></li>";
        $cadena.="<li><a href='altas.php'>Altas</a></li>";
        $cadena.="<li><a href='php/cerrar.php'>Cerrar Sesión</a></li>";
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenida</title>
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
    </head>
    <body>
        <h1>Bienvenido <?= $nombre ?></h1>
        <nav><?= $cadena ?></nav>
        <script src="js/jquery-ui-1.11.4/"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </body>
</html>