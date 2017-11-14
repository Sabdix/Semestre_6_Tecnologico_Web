<?php
//var_dump($_SERVER);
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "Error";
} else {
    extract($_POST);
    require("conexion.php");
    //Se establece la conexión mandandole los datos de conexion.php
    $conexion = pg_connect("host=$host port=$port dbname=$bd user=$user password=$password")or die("Error al conectar".pg_last_error());
    //Se guarda en texto la consulta de manera dinámica
    $SQL = "SELECT * FROM usuarios WHERE nombre='$usuario' AND password=md5('$contrasena')";
    //Se realiza la consulta tomando la conxión a la base de datos y el texto de la consulta creado anteriormente
    $resultado = pg_query($conexion, $SQL) or die("Error al realizar la consulta");
    //Se toma el número de filas que retorno el resultado de la consulta anterior
    $tuplas = pg_num_rows($resultado);
    //Si el número de filas es 1 entonces entra
    if($tuplas == 1) {
        $fila = pg_fetch_array($resultado);
        session_start();
        $_SESSION['id_tipo'] = $fila['id_tipo'];
        $_SESSION['nombre'] = $fila['nombre'];
        header("Location: ../bienvenida.php");
    } else {
        $error = "Usuario o Contraseña Equivocados";
        header("Location: ../index.php?error=.$error");
    }
}
?>