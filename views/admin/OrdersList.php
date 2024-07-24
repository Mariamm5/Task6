<?php
session_start();
$orders = $_SESSION['orders'];
include_once "../../controllers/AddBooksController.php";
global $booksList;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
<div class="container mt-5">
    <?php foreach ($orders as $order): ?>
        <div class="card" style="margin: 15px">
            <div class="card-body">
                <h3 class="card-title">User Information</h3>
                <div class="user_info mb-4">
                    <p class="card-text"><strong>Full Name:</strong> <?= $order['full_name'] ?></p>
                    <p class="card-text"><strong>Email:</strong> <?= $order['email'] ?></p>
                    <p class="card-text"><strong>Phone Number:</strong> <?= $order['number'] ?></p>
                    <p class="card-text"><strong>Address Info:</strong> <?= $order['city'] . " " . $order['address'] ?>
                    </p>
                </div>
                <h3 class="card-title">Order Information</h3>
                <div class="order_info">
                    <p class="card-text"><strong>Book Id:</strong> <?= $order['book_id'] ?></p>
                    <p class="card-text"><strong>Ordered Time:</strong> <?= $order['order_date'] ?></p>
                    <p class="card-text"><strong>Total:</strong> <?= $order['quantity'] ?></p>
                    <p class="card-text"><strong>Summary:</strong>
                        <?php foreach ($booksList as $book): ?>
                            <?php if ($book['id'] === $order['book_id']): ?>
                                <?= $book['price'] * $order['quantity'] . ' դրամ'; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
