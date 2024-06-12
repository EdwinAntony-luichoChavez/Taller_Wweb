<?php
$server_name = "localhost";
$username = "root";
$password = "password123456789";
$db_name = "biblioteca";

$conn = new mysqli($server_name, $username, $password, $db_name);
if ($conn->connect_errno) {
    echo ("Conexion fallida: ");
} else {
    echo ("Conexion exitosa");
}

function conexionDB()
{
    $con = new mysqli('localhost', 'root', '', 'biblioteca');
    if ($con->connect_errno) {
        echo ('Error de conexion');
        exit;
    }
    return $con;
}
