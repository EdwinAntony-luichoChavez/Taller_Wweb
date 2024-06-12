<?php
class BookController extends DBController
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createBook($title, $authorId, $publisherId, $categoryId, $publicationYear, $stock)
    {
        $stmt = $this->db->prepare("INSERT INTO libros(titulo, id_autor, id_editorial, id_categoria, año_publicacion, stock) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siiisi", $title, $authorId, $publisherId, $categoryId, $publicationYear, $stock);
        $stmt->execute();
        $stmt->close();
    }

    public function readBooks()
    {
        $result = $this->db->query("SELECT * FROM libros");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateBook($id, $title, $authorId, $publisherId, $categoryId, $publicationYear, $stock)
    {
        $stmt = $this->db->prepare("UPDATE libros SET titulo = ?, id_autor = ?, id_editorial = ?, id_categoria = ?, año_publicacion = ?, stock = ? WHERE id = ?");
        $stmt->bind_param("siiisi", $title, $authorId, $publisherId, $categoryId, $publicationYear, $stock, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteBook($id)
    {
        $stmt = $this->db->prepare("DELETE FROM libros WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
