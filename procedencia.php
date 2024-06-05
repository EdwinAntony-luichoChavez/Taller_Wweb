<?php
//registrar lugar de procedencia
include "/xampp/htdocs/Taller_Web/Conexion/conexion.php";
$conecta=conexionDB();
$procedencia=$_POST['lugar'];
$sqlprocedencia="insert into lugares_procedencia (lugar) 
value('$procedencia')";
if($conecta->query($sqlprocedencia)==true   ){
    echo "<script>alert('lugar registrado correctamente');   window.location.href='datos.php';</script>;";
}else{
    echo("Error en el registro");
}
?>
