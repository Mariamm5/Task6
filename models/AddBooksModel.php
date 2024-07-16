<?php
require_once __DIR__ . '/../Database.php';

class AddBooksModel
{
    private $conn;
    private $tableName = 'books';
    public $title;
    public $author;
    public $description;
    public $price;
    public $img_path;
    public $newTitle;
    public $newAuthor;
    public $newDescription;
    public $newPrice;
    public $newImg_path;
    public $id;

    public function __construct($db)
    {
        $this->conn = $db;

    }

    public function getBooks()
    {
        $query = "SELECT * FROM $this->tableName";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function addBook()
    {
        $query = "INSERT INTO $this->tableName
    ( title,author,description,price,image_path)
    VALUES (:title,:author,:description,:price,:img_path)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":img_path", $this->img_path);
        return $stmt->execute();
    }

    public function updateBook()
    {
        $query = "UPDATE $this->tableName
        SET title = :title,author = :author,description = :description , price = :price,image_path=:image_path
        WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":title", $this->newTitle);
        $stmt->bindParam(":author", $this->newAuthor);
        $stmt->bindParam(":description", $this->newDescription);
        $stmt->bindParam(":price", $this->newPrice);
        $stmt->bindParam(":image_path", $this->newImg_path);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

}

