<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Order Form</h1>
    <form action="../../controllers/OrdersController.php" method="post">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="full_name" placeholder="Full Name" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="number">Contact Number</label>
            <input type="tel" class="form-control" id="number" name="number" placeholder="+374000000" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
        </div>
        <div class="form-group">
            <label for="address">Street Address and Home Number</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Street Address and Home Number" required>
        </div>
        <div class="form-group">
            <label for="postal">Postal / Zip Code</label>
            <input type="text" class="form-control" id="postal" name="postal" placeholder="Postal / Zip Code" required>
        </div>
        <div class="form-group">
            <label for="quantity">Total</label>
            <input type="text" class="form-control" id="total" name="quantity" placeholder="Total" required>
        </div>
        <div class="form-group">
            <input type="reset" class="btn btn-secondary btn-block" value="Reset All">
        </div>
        <?php
        if(isset($_GET['id'])){
            $_SESSION['id'] = $_GET['id'];
        }
        ?>
        <button type="submit" class="btn btn-primary btn-block" name="order">Order</button>
    </form>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
