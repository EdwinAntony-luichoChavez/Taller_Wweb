DROP DATABASE IF EXISTS biblioteca;
CREATE DATABASE biblioteca CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_general_ci;
USE biblioteca;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    apellido VARCHAR(200) NOT NULL,
    nombre VARCHAR(200) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL,
    fecha_registro DATE NOT NULL DEFAULT (CURDATE())
) ENGINE=InnoDB;

CREATE TABLE lugares_procedencia (
    id_lugar_procedencia INT PRIMARY KEY AUTO_INCREMENT,
    lugar VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE autores (
    id_autor INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    id_lugar_procedencia INT,
    fecha_nacimiento DATE,
    FOREIGN KEY (id_lugar_procedencia) REFERENCES lugares_procedencia(id_lugar_procedencia)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE categorias (
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    categoria VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE editoriales (
    id_editorial INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(255)
) ENGINE=InnoDB;

CREATE TABLE libros (
    id_libro INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    id_autor INT,
    id_editorial INT,
    id_categoria INT,
    año_publicacion INT,
    stock INT NOT NULL,
    FOREIGN KEY (id_autor) REFERENCES autores(id_autor)
        ON DELETE SET NULL
        ON UPDATE CASCADE,
    FOREIGN KEY (id_editorial) REFERENCES editoriales(id_editorial)
        ON DELETE SET NULL
        ON UPDATE CASCADE,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE prestamos (
    id_prestamo INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    id_libro INT,
    fecha_prestamo DATE NOT NULL,
    fecha_devolucion DATE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (id_libro) REFERENCES libros(id_libro)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;
-- lugar de procedencia
INSERT INTO lugares_procedencia (lugar) VALUES ('Inglaterra'),('Rusia'),('Estados Unidos'),('Francia'),('Colombia'),('Irlanda'),
('Alemania'),('Austria'),('Italia'),('Chile'),('España'),('Japón'),('Grecia'),('Brasil'),('Argentina');
-- seleccionar id de procedencia
INSERT INTO autores (nombre, id_lugar_procedencia, fecha_nacimiento) VALUES ('William Shakespeare', 1, '1564-04-26'),('Leo Tolstoy', 2, '1828-09-09'),
('Mark Twain', 3, '1835-11-30'),('Victor Hugo', 4, '1802-02-26'),('Gabriel García Márquez', 5, '1927-03-06'),('James Joyce', 6, '1882-02-02'),
('Johann Wolfgang von Goethe', 7, '1749-08-28'),('Franz Kafka', 8, '1883-07-03'),('Dante Alighieri', 9, '1265-05-21'),('Pablo Neruda', 10, '1904-07-12'),
('Miguel de Cervantes', 11, '1547-09-29'),('Haruki Murakami', 12, '1949-01-12'),('Homer0', 13, NULL),('Jorge Amado', 14, '1912-08-10'),
('Jorge Luis Borges', 15, '1899-08-24');
-- editoriales
INSERT INTO editoriales (nombre, direccion) VALUES 
('Alfaguara', 'Calle de Almagro, 36, 28010 Madrid, Spain'),('Planeta', 'Av. Diagonal, 662-664, 08034 Barcelona, Spain'),
('Seix Barral', 'Calle de Casp, 6, 08010 Barcelona, Spain'),('Sudamericana', 'Avenida Leandro N. Alem 720, Buenos Aires, Argentina'),
('Fondo de Cultura Económica', 'Carretera Picacho-Ajusco 227, Jardines en la Montaña, 14210 Ciudad de México, México'),
('Siglo XXI Editores', 'Tennessee 27, Nápoles, Benito Juárez, 03810 Ciudad de México, México'),
('Editorial Losada', 'Av. Leandro N. Alem 720, Buenos Aires, Argentina'),
('Editorial Norma', 'Carrera 85K #46A-66, Bogotá, Colombia'),
('Editorial Lumen', 'Santa Fe 1480, Buenos Aires, Argentina'),
('Editorial Anagrama', 'Pedro de Valdivia 1234, Santiago, Chile');
INSERT INTO editoriales (nombre, direccion) VALUES 
('Penguin Books', '80 Strand, London, WC2R 0RL, England'),
('HarperCollins', '195 Broadway, New York, NY 10007, USA'),
('Simon & Schuster', '1230 Avenue of the Americas, New York, NY 10020, USA'),
('Vintage Books', '1745 Broadway, New York, NY 10019, USA'),
('Random House', '1745 Broadway, New York, NY 10019, USA'),
('Alfaguara', 'Calle de Almagro, 36, 28010 Madrid, Spain'),
('Planeta', 'Av. Diagonal, 662-664, 08034 Barcelona, Spain'),
('Seix Barral', 'Calle de Casp, 6, 08010 Barcelona, Spain'),
('Faber & Faber', 'Bloomsbury House, 74-77 Great Russell St, London WC1B 3DA, England'),
('Knopf', '1745 Broadway, New York, NY 10019, USA');

-- categorias
INSERT INTO categorias (categoria) VALUES ('Ficción'),('No ficción'),('Literatura clásica'),('Poesía'),('Novela histórica'),('Ciencia ficción'),
('Misterio y suspense'),('Literatura infantil'),('Fantasía'),('Biografía'),('Ensayo'),('Autoayuda'),('Drama'),('Romance'),('Aventura');
-- libros
-- Libros reconocidos
INSERT INTO libros (titulo, id_autor, id_editorial, id_categoria, año_publicacion, stock) VALUES 
('Romeo y Julieta', 1, 1, 3, 1597, 50), -- Shakespeare
('Guerra y paz', 2, 2, 3, 1869, 30), -- Leo Tolstoy
('Las aventuras de Tom Sawyer', 3, 3, 8, 1876, 40), -- Mark Twain
('Los miserables', 4, 4, 3, 1862, 35), -- Victor Hugo
('Cien años de soledad', 5, 5, 1, 1967, 60), -- Gabriel García Márquez
('Ulises', 6, 6, 3, 1922, 25), -- James Joyce
('Fausto', 7, 7, 3, 1808, 20), -- Johann Wolfgang von Goethe
('La metamorfosis', 8, 8, 6, 1915, 25), -- Franz Kafka
('La divina comedia', 9, 9, 3, 1320, 30), -- Dante Alighieri
('Veinte poemas de amor y una canción desesperada', 10, 10, 4, 1924, 45); -- Pablo Neruda
-- Libros de América del Sur
INSERT INTO libros (titulo, id_autor, id_editorial, id_categoria, año_publicacion, stock) VALUES 
('Don Quijote de la Mancha', 11, 11, 3, 1605, 40),
('Kafka en la orilla', 12, 12, 6, 2002, 25),
('La Ilíada', 13, 13, 3, null, 30),
('Gabriela, clavo y canela', 14, 14, 1, 1958, 20),
('Ficciones', 15, 15, 3, 1944, 35);