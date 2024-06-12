<?php
include "/xampp/htdocs/Taller_Web/db/dbConnection.php";
$conecta1 = conexionDB();
$usuario = $_POST['username'];
$clave = $_POST['password'];

$sqlLogin = "select correo,clave from usuarios where correo='$usuario' and clave='$clave'";
if ($conecta1->query($sqlLogin)) {
    header("Location: admin.html");
    exit;
} else {
    echo ("Error al ingresar");
}
