<?php
include "/xampp/htdocs/Taller_Web/Conexion/conexion.php";
$conecta = conexionDB();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sqlEliminarLibro = "DELETE FROM libros WHERE id_libro = $id";

    if ($conecta->query($sqlEliminarLibro) === TRUE) {
        echo "<script>alert('Libro eliminado correctamente'); window.location.href='libros.php';</script>";
    } else {
        echo "Error al eliminar: " . $conecta->error;
    }
}
