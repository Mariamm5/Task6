<?php
include_once __DIR__ . '/../models/AddBooksModel.php';
include_once __DIR__ . '/../Database.php';

$data = new Database();
$db = $data->getConnection();
$bookModel = new AddBooksModel($db);
$booksList = $bookModel->getBooks();
//echo "10";
class AddBooksController
{
    private $db;
    private $book;

    public function __construct($db)
    {
        $this->db = $db;
        $this->book = new AddBooksModel($this->db);
    }

    public function addBook($title, $author, $description, $price, $img_path)
    {
        $this->book->title = $title;
        $this->book->author = $author;
        $this->book->description = $description;
        $this->book->price = $price;
        $this->book->img_path = $img_path;
        return $this->book->addBook();

    }

    public function updateBook($newTitle, $newAuthor, $newDescription, $newPrice, $newImg_path, $id)
    {
        $this->book->newTitle = $newTitle;
        $this->book->newAuthor = $newAuthor;
        $this->book->newDescription = $newDescription;
        $this->book->newPrice = $newPrice;
        $this->book->newImg_path = $newImg_path;
        $this->book->id = $id;
        return $this->book->updateBook();


    }
}

///////////////get the books in data

if (isset($_POST['addBook'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $imgPath = '';
    if (isset($_FILES['img'])) {
        $uploadDir = '../assets/img/';
        $imgPath = $uploadDir . basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'], $imgPath);

    }
    $controller = new AddBooksController($db);
    if ($controller->addBook($title, $author, $description, $price, $imgPath)) {
        header("Location:../views/admin/BooksListAdmin.php");
    } else {
        header("Location:../views/admin/AddBooks.php");
    }

}
//////////////////////////////////////////////////////////////////////////
////////upDate book info

if (isset($_POST['edited'])) {
    if (isset($_GET['?=id'])) {
        $id = $_GET['id'];
        echo $id;

        $newTitle = $_POST['newTitle'];
        $newAuthor = $_POST['newAuthor'];
        $newDescription = $_POST['newDescription'];
        $newPrice = $_POST['newPrice'];

        $newImgPath = '';
        if (isset($_FILES['newImg'])) {
            $uploadDir = '../assets/img/';
            $newImgPath = $uploadDir . basename($_FILES['newImg']['name']);
            move_uploaded_file($_FILES['newImg']['tmp_name'], $newImgPath);
        }
        $updatedBookList = new AddBooksController($db);
        if ($updatedBookList->updateBook($newTitle, $newAuthor, $newDescription, $newPrice, $newImgPath, $id)) {
            header("Location:../views/admin/BooksListAdmin");
        } else {
            echo "Cant update book";
        }
    }

}
