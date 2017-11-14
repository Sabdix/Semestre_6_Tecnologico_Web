<?php
//print var_dump($_POST);
session_start();
if(!isset($_SESSION["id_tipo"])) {
    $error = "Acceso no autorizado";
    session_destroy();
    header("Location: ../index.php?error=$error");
}
extract($_POST);
//print "Usuario = $usuario y Password = $contrasena;
include("conexion.php");
$conexion = pg_connect("host=$host port=$port user=$user password=$password dbname=$bd") or die("Error al conectar la base de datos:". pg_last_error());

$SQL = "SELECT * FROM usuarios";

$resultado = pg_query($conexion, $SQL) or die("Error al realizar la consulta");

$exito = pg_num_rows($resultado);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="../bootstrap-3.3.6-dist/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        if($exito > 0) {
        ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Password</th>
                    <th>Tipo de Trabajador</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($fila = pg_fetch_array($resultado)) {
                    if ($_SESSION["id_tipo"] == 3) {
                ?>
                <tr>
                    <td><?= $fila["id"]?></td>
                    <td><?= $fila["nombre"]?></td>
                    <td><?= $fila["password"]?></td>
                    <td><?= $fila["id_tipo"]?></td>
                    <td><a href="../bajas.php?id=<?=$fila["id"]?>" class="btn btn-danger btn-lg">Eliminar</a></td>
                    <td><a href="../modificar.php?id=<?=$fila["id"]?>" class="btn btn-danger btn-lg">Modificar</a></td>
                </tr>
                <?php
                    } else {
                ?>
                <tr>
                    <td><?= $fila["id"]?></td>
                    <td><?= $fila["nombre"]?></td>
                    <td><?= $fila["password"]?></td>
                    <td><?= $fila["id_tipo"]?></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
        } else {
            echo "No existen Usuarios";
        }
        pg_free_result($resultado);
        pg_close($conexion);
        ?>
        <a href="../bienvenida.php" class="btn btn-danger">Regresar a Bienvenida</a>
        <script src="../js/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
        <script src="../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script src="../js/funciones.js"></script>
    </body>
</html> 