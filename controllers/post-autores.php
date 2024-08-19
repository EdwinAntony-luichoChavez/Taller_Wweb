<?php
include "/xampp/htdocs/Taller_Web/db/dbConnection.php";

$nombre = $_POST['nombre'];
$procedencia = $_POST['id_lugar_procedencia'];
$fnacimiento = $_POST['fecha_nacimiento'];

$conecta = conexionDB();

$sqlautor = $conecta->prepare("INSERT INTO autores (nombre, id_lugar_procedencia, fecha_nacimiento) 
VALUES ('$nombre','$procedencia','$fnacimiento')");

// verifica si la consulta fue exitosa
if ($sqlautor->execute()) {
    // Redirigir la pagina
    echo "<script>alert('Autor registrado correctamente.'); window.location.href = 'datos.php';</script>";
} else {
    // Mostrar error
    echo "Error en el registro: " . $sqlautor->error;
}

// Cerrar la conexión
$sqlautor->close();
$conecta->close();
