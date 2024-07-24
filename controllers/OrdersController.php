<?php
session_start();
include_once "../models/OrderModel.php";
include_once "../Database.php";
$data = new Database();
$db = $data->getConnection();
$orders = null;

class OrdersController
{
    private $db;
    private $order;

    public function __construct($db)

    {
        $this->db = $db;
        $this->order = new OrderModel($this->db);
    }

    public function addOrder($full_name, $email, $number, $city, $address, $postal, $quantity, $book_id)
    {
        $this->order->full_name = $full_name;
        $this->order->email = $email;
        $this->order->number = $number;
        $this->order->city = $city;
        $this->order->address = $address;
        $this->order->postal = $postal;
        $this->order->quantity = $quantity;
        $this->order->book_id = $book_id;
        return $this->order->addOrder();

    }

    public function getOrderInfo()
    {
        return $this->order->getOrderInfo();
    }
}


if (isset($_POST['order']) && isset($_SESSION['id'])) {
    $book_id = $_SESSION['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $postal = $_POST['postal'];
    $quantity = $_POST['quantity'];
    $order = new OrdersController($db);
    if ($order->addOrder($full_name, $email, $number, $city, $address, $postal, $quantity, $book_id)) {
        header("Location:../views/user/BooksList.php");
    } else {
        echo "Some error";
    }
}


if (isset($_POST['orders'])) {
    $info = new OrdersController($db);
    $orders = $info->getOrderInfo();
    $_SESSION['orders'] = $orders;
    header("Location:../views/admin/OrdersList.php");
}