<?php
include "/xampp/htdocs/Taller_Web/Conexion/conexion.php";
$conecta = conexionDB();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sqlLlamarLibro = "SELECT * FROM libros WHERE id = $id";
    $result = $conecta->query($sqlLlamarLibro);
    $libro = $result->fetch_assoc();
}

// Consultas para llenar los selectores de autor, editorial y categoría
$sqlLlamarAutor = "SELECT id_autor, nombre FROM autores";
$resultAutor = $conecta->query($sqlLlamarAutor);

$sqlLlamarEditorial = "SELECT id_editorial, nombre FROM editoriales";
$resultEditorial = $conecta->query($sqlLlamarEditorial);

$sqlLlamarCategoria = "SELECT id_categoria, categoria FROM categorias";
$resultCategoria = $conecta->query($sqlLlamarCategoria);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $idAutor = $_POST['id_autor'];
    $idEditorial = $_POST['id_editoriales'];
    $idCategoria = $_POST['id_categoria'];
    $añoPublicacion = $_POST['año_publicacion'];
    $stock = $_POST['stock'];
    
    $sqlActualizarLibro = "UPDATE libros SET titulo='$titulo', id_autor='$idAutor', id_editorial='$idEditorial', id_categoria='$idCategoria', año_publicacion='$añoPublicacion', stock='$stock' WHERE id=$id";
    
    if ($conecta->query($sqlActualizarLibro) === TRUE) {
        echo "<script>alert('Libro actualizado correctamente'); window.location.href='libros.php';</script>";
    } else {
        echo "Error al actualizar: " . $conecta->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
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
            <h1>Editar Libro</h1>
            <form action="editar_libro.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $libro['id']; ?>">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo $libro['titulo']; ?>" required>
                <label for="autor">Autor:</label>
                <select id="autor" name="id_autor" required>
                    <option value="" disabled>Seleccionar</option>
                    <?php
                    if ($resultAutor->num_rows > 0) {
                        while ($row = $resultAutor->fetch_assoc()) {
                            $selected = ($row["id_autor"] == $libro['id_autor']) ? 'selected' : '';
                            echo "<option value='" . $row["id_autor"] . "' $selected>" . $row["nombre"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay Autores registrados</option>";
                    }
                    ?>
                </select>
                <label for="editorial">Editorial:</label>
                <select id="editorial" name="id_editoriales" required>
                    <option value="" disabled>Seleccionar</option>
                    <?php
                    if ($resultEditorial->num_rows > 0) {
                        while ($row = $resultEditorial->fetch_assoc()) {
                            $selected = ($row["id_editorial"] == $libro['id_editorial']) ? 'selected' : '';
                            echo "<option value='" . $row["id_editorial"] . "' $selected>" . $row["nombre"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay editoriales registradas</option>";
                    }
                    ?>
                </select>
                <label for="categoria">Categoría:</label>
                <select id="categoria" name="id_categoria" required>
                    <option value="" disabled>Seleccionar</option>
                    <?php
                    if ($resultCategoria->num_rows > 0) {
                        while ($row = $resultCategoria->fetch_assoc()) {
                            $selected = ($row["id_categoria"] == $libro['id_categoria']) ? 'selected' : '';
                            echo "<option value='" . $row["id_categoria"] . "' $selected>" . $row["categoria"] . "</option>";
                        }
                    }
                    ?>
                </select>
                <label for="año_publicacion">Año de Publicación:</label>
                <input type="number" id="año_publicacion" name="año_publicacion" value="<?php echo $libro['año_publicacion']; ?>" required>
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" value="<?php echo $libro['stock']; ?>" required>
                <input type="submit" value="Actualizar Libro">
            </form>
        </div>
    </div>
    <footer class="footer" id="contact">
        <h2>Contacto</h2>
        <p>
            Para más información, por favor contáctenos en
            <a href="mailto:U22235570@utp.edu.pe">U19305243@utp.edu.pe</a>.
        </p>
        <small>&copy; 2024 Biblioteca Educativa LCE. Todos los derechos reservados.</small>
    </footer>
</body>
</html>


