<?php
session_start();

if (!isset($_SESSION["id_tipo"])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Log In</title>
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
    </head>
    <body>
        <header class="page-header">
            <h1>Log In</h1>
        </header>
        <div>
            <form action="php/index.php" method="post" class="form-inline">
                <div class="form-group">
                    <label for="usuario">Usuario: </label>
                    <input type="text" name="usuario" id="usuario">
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña: </label>
                    <input type="password" name="contrasena" id="contrasena">
                </div>
                <button type="submit" class="btn">Enviar</button>
            </form>
        </div>
        <?php
            if(isset($_GET["error"])) {
                echo $_GET["error"];
            }
        ?>
        <script src="js/jquery-ui-1.11.4/"></script>
        <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </body>
</html>
<?php
} else {
    header("Location: bienvenida.php");
}
?>