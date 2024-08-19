
<?php
$apellidos = $_POST['apellido'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$correo = $_POST['email'];
$contraseña = $_POST['contrasena'];

include '/xampp/htdocs/Taller_Web/db/dbConnection.php';
$conecta = conexionDB();
$codigosql = "insert into usuarios (apellido,nombre,telefono,direccion,correo,clave)
values('$apellidos','$nombre','$telefono','$direccion','$correo','$contraseña')";
if ($conecta->query($codigosql) == true) {
    // Redirigir a admin.html
    header("Location: admin.html");
    exit; // Terminar el script para evitar ejecución adicional
} else {
    echo "Error en el proceso de registro";
}
$conecta->close();

function eliminar(){
}
?>  

