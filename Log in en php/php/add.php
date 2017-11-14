<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "Error";
} else {
    extract($_POST);
    require("conexion.php");

    $conexion = pg_connect("host=$host port=$port dbname=$bd user=$user password=$password")or die("Error al conectar".pg_last_error());
    $SQLM = "SELECT MAX(id) as maximo FROM usuarios";
    $id = pg_query($conexion, $SQLM) or die("Error");
    $exito1 = pg_num_rows($id);

    if ($exito1 > 0) {
        $fila = pg_fetch_array($id);
        $ID = $fila['maximo'] + 1;
        $SQL = "INSERT INTO usuarios VALUES ($ID, '$User', md5('$pass'), '$type')";
        $ADD = pg_query($conexion, $SQL) or die("Error");
        $exito2 = pg_num_rows($ADD);
        pg_free_result($ADD);
        header("Location: login.php");
    } else {
        $error = "Problema con la base de datos";
        pg_free_result($id);
        pg_close($conexion);
        header("Location: ../bienvenida.php?error=$error");
    }
    pg_close($conexion);
    pg_free_result($id);
}
?>