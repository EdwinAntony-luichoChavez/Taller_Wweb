<?php
$server_name = "localhost";
$username = "root";
$password = "password123456789";
$BDname = "biblioteca";

$conn = new mysqli($server_name, $username, $password, $BDname);
if ($conn->connect_errno) {
    echo ("Conexion fallida: ");
} else {
    echo ("Conexion exitosa");
}


function conexionDB()
{
    $con = new mysqli('localhost', 'root', 'password123456789', 'biblioteca');
    if ($con->connect_errno) {
        echo ('Error de conexion');
        exit;
    }
    return $con;
}
