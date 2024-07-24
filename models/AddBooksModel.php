<?php
//require_once __DIR__ . '/../Database.php';

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
        SET title=:newTitle,author=:newAuthor,description=:newDescription,price=:newPrice,image_path=:newImg_path
        WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":newTitle", $this->newTitle);
        $stmt->bindParam(":newAuthor", $this->newAuthor);
        $stmt->bindParam(":newDescription", $this->newDescription);
        $stmt->bindParam(":newPrice", $this->newPrice);
        $stmt->bindParam(":newImg_path", $this->newImg_path);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    public function deleteBook($id)
    {
        $query = "DELETE FROM $this->tableName WHERE id= $id";
        $stmt = $this->conn->prepare($query);
//        $stmt->bindParam(":id", $id);
        return $stmt->execute();

    }

    public function getBookById($id)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
