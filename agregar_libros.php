<?php
include "/xampp/htdocs/Taller_Web/Conexion/conexion.php";
$titulo=$_POST['titulo'];
$idAutor=$_POST['id_autor'];
$idEditorial=$_POST['id_editorial'];
$idCategoria=$_POST['id_categoria'];
$añoPublicacion=$_POST['año_publicacion'];
$stock=$_POST['stock'];
$conecta=conexionDB();
$sqlagregarlibros="INSERT INTO libros(titulo,id_autor,id_editorial,id_categoria,año_publicacion,stock)
VALUES('$titulo','$idAutor','$idEditorial','$idCategoria','$añoPublicacion','$stock')";
if ($conecta->query($sqlagregarlibros)==true){
    echo "<script>alert('Libro guardado correctamente'); window.location.href='libros.php'</script>";
}else{
    echo "Error al guardar".$conecta->error;
}
$conecta->close();
?>