<?php
include '/xampp/htdocs/Taller_Web/Conexion/conexion.php';
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$conecta=conexionDB();
$sqleditorial="INSERT INTO editoriales (nombre,direccion)
VALUES('$nombre','$direccion') ";
if($conecta->query($sqleditorial)){
    echo "<script>alert('Editorial guardada correctamente');window.location.href='datos.php';</script>";
}else{
    echo "Error en la conexion".$conecta->error;
}
?>