<?php
//llamar autores
include "/xampp/htdocs/Taller_Web/Conexion/conexion.php";
$conecta = conexionDB();
$sqlLlamarautor = "SELECT id_autor,nombre FROM autores";
$result = $conecta->query($sqlLlamarautor);
//llamar editorial
$sqlLlamarEditorial = "SELECT id_editorial,nombre FROM editoriales";
$result1 = $conecta->query($sqlLlamarEditorial);
//llamar categoria
$sqlLlamarcategoria = "SELECT id_categoria,categoria FROM categorias";
$result2 = $conecta->query($sqlLlamarcategoria);
//Llamar libro
$sqlLlamarlibros = "SELECT libros.id_libro,libros.titulo, autores.nombre AS autor, editoriales.nombre AS editorial, categorias.categoria, libros.año_publicacion, libros.stock
FROM libros
JOIN autores ON libros.id_autor = autores.id_autor
JOIN editoriales ON libros.id_editorial = editoriales.id_editorial
JOIN categorias ON libros.id_categoria = categorias.id_categoria";
$result3 = $conecta->query($sqlLlamarlibros);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar Libros</title>
    <link rel="stylesheet" href="Style/agregar.css">

</head>

<body>
    <header class="header">
        <h1 class="header-h1">Biblioteca Educativa LCE</h1>
        <img src="imagen/logo.jpg" alt="Logo de la Biblioteca" class="header-img" />
    </header>
    <nav>
        <a href="admin.html">Inicio</a>
        <a href="libros.php">Agregar Libros</a>
        <a href="datos.php">Agregar Datos</a>
    </nav>
    <div class="conteiner">
        <div class="form-conteiner">
            <h1>Registrar Libros</h1>
            <form id="registro-libro" action="agregar_libros.php" method="POST">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
                <label for="autor">Autor:</label>
                <select id="autor" name="id_autor" required>
                    <option value="" disabled selected>Seleccionar</option>
                    <?php
                    //autores
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id_autor"] . "'>" . $row["nombre"] . "</option>";
                        }
                    } else {
                        echo "<option value=''> No hay Autores registrados</option>";
                    }
                    ?>
                </select>
                <label for="editorial">Editorial:</label>
                <select id="editorial" name="id_editorial" required>
                    <option value="" disabled selected>Seleccionar</option>
                    <?php
                    //editorial
                    if ($result1->num_rows > 0) {
                        while ($row = $result1->fetch_assoc()) {
                            echo "<option value='" . $row["id_editorial"] . "'>" . $row["nombre"] . "</option>";
                        }
                    } else {
                        echo "<option value=''> No hay editoriales registrados</option>";
                    }
                    ?>
                </select>
                <label for="categoria">Categoría:</label>
                <select id="categoria" name="id_categoria" required>
                    <option value="" disabled selected>Seleccionar</option>
                    <?php
                    //categoria
                    if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {
                            echo "<option value='" . $row["id_categoria"] . "'>" . $row["categoria"] . "</option>";
                        }
                    }
                    ?>
                </select>
                <label for="año_publicacion">Año de Publicación:</label>
                <input type="number" id="año_publicacion" name="año_publicacion" required>
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" required>
                <input type="submit" value="Registrar Libro">
            </form>
        </div>
        <div class="table-conteiner">
            <h1>Datos del Libro a Registrar</h1>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th>Categoría</th>
                        <th>Año de Publicación</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody id="registro-datos">
                    <?php
                    if ($result3->num_rows > 0) {
                        while ($row = $result3->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th>" . $row["titulo"] . "</th>";
                            echo "<th>" . $row["autor"] . "</th>";
                            echo "<th>" . $row["editorial"] . "</th>";
                            echo "<th>" . $row["categoria"] . "</th>";
                            echo "<th>" . $row["año_publicacion"] . "</th>";
                            echo "<th>" . $row["stock"] . "</th>";
                            echo "<td>";
                            echo "<a href='edita_libros.php?id=" . $row["id_libro"] . "'>Editar</a> | ";
                            echo "<a href='eliminar_libro.php?id=" . $row["id_libro"] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este libro?\")'>Eliminar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No hay libros guardados</td></tr>";
                    }
                    ?>
                </tbody>

            </table>
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