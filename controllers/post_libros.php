<?php
include "/xampp/htdocs/Taller_Web/db/dbConnection.php";
$titulo = $_POST['titulo'];
$id_autor = $_POST['id_autor'];
$id_editorial = $_POST['id_editorial'];
$id_categoria = $_POST['id_categoria'];
$ano_publicacion = $_POST['año_publicacion'];
$stock = $_POST['stock'];
$conecta = conexionDB();
$query_agregar_libros = "INSERT INTO libros(titulo,id_autor,id_editorial,id_categoria,año_publicacion,stock)
VALUES('$titulo','$id_autor','$id_editorial','$id_categoria','$ano_publicacion','$stock')";
if ($conecta->query($query_agregar_libros) == true) {
    echo "<script>alert('Libro guardado correctamente'); window.location.href='libros.php'</script>";
} else {
    echo "<h1>Error al guardar" . $conecta->error . "</h1>";
}
$conecta->close();
