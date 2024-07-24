<?php
//include_once '../controllers/AddBooksController.php';
////require_once "../models/AddBooksModel.php";
//include_once "../actions/AdminAction.php";
//global $id;
//global $db;
////////////////////////////////////////////////////////////////////////////
//////////upDate book info
////if(empty($_POST['edited'])){
////    echo "empty";
////}
//echo "1";
//echo "<br>";
//
//if ( isset($_POST['edited'])) {
//
//    echo $id;
//    echo "2";
//    echo "<br>";
//    $newTitle = $_POST['newTitle'];
//    $newAuthor = $_POST['newAuthor'];
//    $newDescription = $_POST['newDescription'];
//    $newPrice = $_POST['newPrice'];
//    echo "3";
//    echo "<br>";
//    $newImgPath = '';
//    if (isset($_FILES['newImg'])) {
//        $uploadDir = '../assets/img/';
//        $newImgPath = $uploadDir . basename($_FILES['newImg']['name']);
//        move_uploaded_file($_FILES['newImg']['tmp_name'], $newImgPath);
//    }
//    $updatedBookList = new AddBooksController($db);
//    if ($updatedBookList->updateBook($newTitle, $newAuthor, $newDescription, $newPrice, $newImgPath, $id)) {
//        header("Location:../views/admin/BooksListAdmin");
//    } else {
//        echo "Cant update book";
//    }
////    }
//
//    echo "verj";
//}
//
//
//////////////////////////////