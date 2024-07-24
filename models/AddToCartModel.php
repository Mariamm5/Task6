<?php


class AddToCartModel
{
    private $conn;
    private $tableName = 'cart';
    public $book_id;
    public $book_title;
    public $book_price;
    public $quantity;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function addCart()
    {
        $query = "INSERT INTO $this->tableName(book_id,book_title,book_price,quantity)
            VALUES (:id,:name,:price,:total)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->book_id);
        $stmt->bindParam(":name", $this->book_title);
        $stmt->bindParam(":price", $this->book_price);
        $stmt->bindParam(":total", $this->quantity);
        return $stmt->execute();
    }

    public function getCart()
    {
        $query = "SELECT * FROM $this->tableName";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;

    }


}