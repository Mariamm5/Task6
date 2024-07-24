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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <style>
        .card {
            width: 350px;
            height: 670px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 10px;
        }

        .card-body {
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;
            text-align: center;
        }

        .card img {
            width: 500px;
            max-height: 400px;
        }

        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <form action="../../controllers/AddToCartController.php" method="post">
        <button name="wishList">
            <ion-icon name="basket" class="me-2"></ion-icon>
            Wish List
        </button>
    </form>

    <h1 class="text-center mt-5 mb-4">Books List</h1>
    <div class="row">
        <?php foreach ($booksList

        as $book): ?>
        <a href="BookFullPage.php?id=<?= $book['id']; ?>">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="../../assets/img/<?= basename($book['image_path']) ?>"
                         class="card-img-top img-fluid rounded" alt="Book Cover">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $book['title']; ?></h5>
                        <p class="card-text"><?= $book['author']; ?></p>
                        <p class="card-text"><?= $book['price']; ?></p>
        </a>
        <div class="mt-auto">
            <div class="d-flex justify-content-between">
                <button name="toCart" class="btn btn-outline-secondary add-to-cart"
                        data-id="<?= $book['id']; ?>"
                        data-title="<?= $book['title']; ?>"
                        data-price="<?= $book['price']; ?>">
                    <ion-icon name="basket"></ion-icon>
                    Add to Cart
                </button>

                <a href="Order.php?id=<?= $book['id']; ?>" class="btn btn-primary"
                   style="margin-left: 5px">
                    <ion-icon name="card"></ion-icon>
                    To Order
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<?php endforeach; ?>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script>
    $(document).ready(function () {
        $(".add-to-cart").click(function () {
            let bookId = $(this).data('id');
            let bookTitle = $(this).data('title');
            let bookPrice = $(this).data('price');
            $.ajax({
                url: '../../controllers/AddToCartController.php',
                type: 'POST',
                data: {id: bookId, name: bookTitle, price: bookPrice},
                success: function (data) {
                    alert(data);
                },
                error: function () {
                    alert('Error adding book to cart.');
                }
            });
        });
    });
</script>

</body>
</html>
