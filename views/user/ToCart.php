<?php
session_start();
$carts = $_SESSION['carts'];
$sum = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wish List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            max-width: 500px;
            margin: 10px auto;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <?php foreach ($carts as $cart): ?>
<!--        --><?php //$sum += $cart['quantity'] * $cart['book_price'] ?>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">ID: <?= htmlspecialchars($cart['id']) ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Book ID: <?= htmlspecialchars($cart['book_id']) ?></h6>
                <h6 class="card-subtitle mb-2 text-muted">Book Title: <?= htmlspecialchars($cart['book_title']) ?></h6>
                <p class="card-text">Book Price: AMD <?= htmlspecialchars($cart['book_price']) ?></p>
                <?php $sum += $cart['quantity'] * $cart['book_price'];?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
