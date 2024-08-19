<?php
include "/xampp/htdocs/Taller_Web/db/dbConnection.php";
$conecta = conexionDB();
$sqlLlamar_procedencia = "SELECT id_lugar_procedencia, lugar FROM lugares_procedencia";
$result = $conecta->query($sqlLlamar_procedencia);
$conecta->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Generales</title>
    <link rel="stylesheet" href="Style/datos.css">
</head>

<body>
    <header class="header">
        <h1 class="header-h1">Biblioteca Educativa LCE</h1>
        <img src="./../assets/logo.jpg" alt="Logo Biblioteca" class="header-img"/>
    </header>
    <nav>
        <a href="admin.html">Incio</a>
        <a href="libros.php">Agregar Libros</a>
        <a href="datos.php">Agregar datos</a>
    </nav>
    <div class="conteiner">
        <!-- Formulario para Lugares de Procedencia -->
        <div class="form-conteiner">
            <h2>Registrar Lugar de Procedencia</h2>
            <form action="procedencia.php" method="POST">
                <label for="lugar">Lugar:</label>
                <br><br>
                <input type="text" id="lugar" name="lugar" required>
                <br><br>
                <input type="submit" value="Registrar Lugar">
            </form>
        </div>
        <!-- Formulario para Autores -->
        <div class="form-conteiner">
            <h2>Registrar Autor</h2>
            <form action="autores.php" method="POST">
                <label for="nombre_autor">Nombre:</label>
                <br><br>
                <input type="text" id="nombre_autor" name="nombre" required>
                <br>
                <label for="lugar_procedencia">Lugar de Procedencia:</label>
                <br>
                <select id="lugar_procedencia" name="id_lugar_procedencia" required>
                    <option value="" disabled selected>Seleccionar</option>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id_lugar_procedencia"] . "'>" . $row["lugar"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay lugares disponibles</option>";
                    }
                    ?>
                </select>
                <br>
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
                <br><br>
                <input type="submit" value="Registrar Autor">
            </form>
        </div>
        <!-- Formulario para Categorías -->
        <div class="form-conteiner">
            <h2>Registrar Categoría</h2>
            <form action="categoria.php" method="POST">
                <label for="categoria">Categoría:</label>
                <input type="text" id="categoria" name="categoria" required>
                <br><br>
                <input type="submit" value="Registrar Categoría">
            </form>
        </div>
        <!-- Formulario para Editoriales -->
        <div class="form-conteiner">
            <h2>Registrar Editorial</h2>
            <form action="editorial.php" method="POST">
                <label for="nombre_editorial">Nombre:</label>
                <input type="text" id="nombre_editorial" name="nombre" required>
                <br><br>
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion">
                <br><br>
                <input type="submit" value="Registrar Editorial">
            </form>
        </div>
    </div>
    <footer class="footer" id="contact">
        <h2>Contacto</h2>
        <p>
            Para más información, por favor contáctenos en
            <a href="mailto:U22235570@utp.edu.pe">U19305243@utp.edu.pe</a>.
        </p>
        <small>&copy; 2024 Biblioteca Educativa LCE. Todos los derechos reservados.
        </small>
    </footer>
</body>

</html>