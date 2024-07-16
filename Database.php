<?php


class Database
{

    protected $host = 'localhost';
    protected $dbname = 'bookstore';
    protected $username = 'root';
    protected $password = '';

    public $conn;

//$this->conn=
    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo 'Connect Error' . $e->getMessage();
            die();
        }
        return $this->conn;
    }

}