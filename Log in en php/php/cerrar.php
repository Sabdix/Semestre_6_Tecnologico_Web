<?php
session_start();
session_destroy();
echo "Se cerro sesión";
 header("Location: ../index.php");
?>