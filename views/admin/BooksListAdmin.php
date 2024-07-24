<?php
session_start();
include_once '../../controllers/AddBooksController.php';
global $booksList;
global $id;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books List Admin Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main {
            padding: 20px;
        }

        .list {
            background-color: #f8f9fa;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .list img {
            max-width: 150px;
            height: auto;
            margin-right: 15px;
        }

        .book-details {
            flex-grow: 1;
        }

        .book-details h2,
        .book-details h4,
        .book-details p,
        .book-details span {
            margin: 3px;
        }

        .buttons {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <a href="AddBooks.php" class="btn btn-primary">Adding Books</a>
</div>
<?php foreach ($booksList as $book): ?>

    <div class="main">
        <div class="list">
            <span><?= $book['id'] ?></span>
            <img src="../../assets/img/<?= basename($book['image_path']) ?>" class="img-fluid rounded" alt="Book Cover">
            <div class="book-details">
                <h2 class="mt-3"><?= $book['title'] ?></h2>
                <h4><?= $book['author'] ?></h4>
                <p><?= $book['description'] ?></p>
                <span><?= $book['price'] ?> դրամ</span>
            </div>

            <div class="buttons">
                <a href="editBook.php?id=<?= $book['id'] ?>" class="btn btn-primary">
                    <ion-icon name="create"></ion-icon>
                    Edit
                </a>
                <form method="post" action="../../controllers/AddBooksController.php" style="margin-left: 5px;">
                    <a href="editBook.php?id=<?= $book['id'] ?>">
                        <button type="submit" name="delete" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this book?');">
                            <ion-icon name="trash"></ion-icon>
                            Delete
                        </button>
                    </a>

                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>
</html>
