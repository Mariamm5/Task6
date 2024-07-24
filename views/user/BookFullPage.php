<?php
session_start();
include_once '../../controllers/AddBooksController.php';
global $getBookById;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Info</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Book Information</h1>
    <div class="row">
        <?php foreach ($getBookById as $book): ?>
            <div class="col-md-4">
                <img src="../../assets/img/<?= basename($book['image_path']) ?>" class="img-fluid rounded" alt="Book Cover">
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $book['title']; ?></h5>
                        <p class="card-text"><strong>Author:</strong> <?= $book['author']; ?></p>
                        <p class="card-text"><strong>Price:</strong> <?= $book['price']; ?></p>
                        <p class="card-text"><strong>Description:</strong> <?= $book['description']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
