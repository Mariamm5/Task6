<?php
session_start();
$admin = $_SESSION['admin'];
$url = $_SERVER['REQUEST_URI'];

function checkAdmin()
{
    return isset($_SESSION['admin']);
}

switch ($url) {
    case '/':
        require 'home.php';
        break;
    case '/admin/LoginAdmin.php':
        require 'views/admin/AdminLogin.php';
        break;
    case 'admin/AddBooks.php':
        if ($admin) {
            require 'views/admin/AddBooks.php';
        };
        break;
    case '/views/BooksList.php':
        require 'views/BooksList.php';
        break;
    case '/views/admin/BooksListAdmin.php':
        require 'views/admin/BooksListAdmin.php';
        break;
    case'/views/admin/editBook.php':
        require 'views/admin/editBook.php';
        break;
    case "/views/admin/":
        require 'views/admin/AddBooks.php';
        break;
    default:
        require 'errorPage.php';
}