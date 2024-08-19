<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Libros</title>
  <link rel="stylesheet" href="Style/libros.css" />
</head>

<body>
  <header class="header">
    <h1 class="header-h1">Biblioteca Educativa LCE</h1>
    <img src="./../assets/logo.jpg" alt="Logo Biblioteca" class="header-img" />
  </header>
  <nav>
    <a href="./../html/index.html">Inicio</a>
    <a href="./libros.php">Libros</a>
    <a href="./../html/servicios.html">Servicios</a>
    <a href="./../html/contacto.html">Contacto</a>
    <a href="./../html/login.html">Login</a>
    <a href="./../html/registro.html">Registro</a>
  </nav>
  <div class="container" id="books">
    <h2>Lista de Libros</h2>
    <table class="book-list" id="book-list">
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Año</th>
        <th>Imagen</th>
        <th>Editar</th>
      </tr>

      <!-- Más libros pueden añadirse aquí -->
    </table>
  </div>

  <footer class="footer" id="contact">
    <h2>Contacto</h2>
    <p>
      Para más información, por favor contáctenos en
      <a href="mailto:U22235570@utp.edu.pe">U19305243@utp.edu.pe</a>.
    </p>
    <small>&copy; 2024 Biblioteca Educativa LCE. Todos los derechos
      reservados.</small>
  </footer>
</body>

</html>