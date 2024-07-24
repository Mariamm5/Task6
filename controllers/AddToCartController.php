<?php
session_start();
//include_onc  "../models/AddToCartModel.php";
include_once "../models/AddToCartModel.php";
include_once "../Database.php";
$data = new Database();
$db = $data->getConnection();
$carts = null;

class AddToCartController
{
    private $db;
    private $cart;

    public function __construct($db)
    {
        $this->db = $db;
        $this->cart = new AddToCartModel($this->db);
    }

    public function addCart($id, $title, $price, $quantity)
    {
        $this->cart->book_id = $id;
        $this->cart->book_title = $title;
        $this->cart->book_price = $price;
        $this->cart->quantity = $quantity;
        return $this->cart->addCart();
    }

    public function getCart()
    {
        return $this->cart->getCart();
    }
}

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])) {
    $id = $_POST['id'];
    $title = $_POST['name'];
    $price = $_POST['price'];
    $cart = new AddToCartController($db);

    if ($cart->addCart($id, $title, $price, 1)) {
        echo 'Book added to cart successfully.';
    } else {
        echo 'Error adding book to cart.';
    }
}


if (isset($_POST['wishList'])) {
    $carts = new AddToCartController($db);
    $carts = $carts->getCart();
    $_SESSION['carts'] = $carts;
    header("Location:../views/user/ToCart.php");

}