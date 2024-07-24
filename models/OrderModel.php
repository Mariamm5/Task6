<?php

class OrderModel
{
    private $conn;
    private $tableName = 'orders';
    public $full_name;
    public $email;
    public $number;
    public $city;
    public $address;
    public $postal;
    public $quantity;
    public $book_id;


    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addOrder()
    {
        $query = "INSERT INTO $this->tableName (full_name,email,number,city,address,postal,quantity,book_id)
                  VALUES (:full_name, :email,:number,:city,:address,:postal,:quantity,:book_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":full_name", $this->full_name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":number", $this->number);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":postal", $this->postal);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":book_id", $this->book_id);
        return $stmt->execute();
    }

    public function getOrderInfo()
    {
        $query = "SELECT * FROM $this->tableName";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}