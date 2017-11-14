<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "Error";
} else {
    extract($_POST);
    require("conexion.php");
    $id = $_GET['id'];
    $conexion = pg_connect("host=$host port=$port dbname=$bd user=$user password=$password")or die("Error al conectar".pg_last_error());
    
    $SQL = "UPDATE usuarios SET nombre='$User', password=md5('$pass'), id_tipo='$type' WHERE id=$id";
    
    $DELETE = pg_query($conexion, $SQL) or die("Error");
    
    pg_close($conexion);
    pg_free_result($DELETE);
    header("Location: login.php");
}
?>