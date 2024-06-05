<?php
include '/xampp/htdocs/Taller_Web/Conexion/conexion.php';
$categoria=$_POST['categoria'];
$sqlcategoria="INSERT INTO categorias(categoria) VALUES ('$categoria')";
$conecta= conexionDB();
if($conecta->query($sqlcategoria)){
    echo "<script>alert('Categoria registrado correctamente'); window.location.href='datos.php';</script>";
}else{
    echo "Error en la conexion" . $conecta->error;
}
?>