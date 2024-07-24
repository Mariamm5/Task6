<?php
if(isset($_SESSION['admin'])): ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Adding Books</title>

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <header class="bg-light py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">Bookstore</h1>
            <form action="../../controllers/AddBooksController.php" method="post">
                <button name="logOut" class="btn btn-danger">Log Out</button>
            </form>
            <a href="BooksListAdmin.php">
                <button class="btn btn-danger">Books List</button>
            </a>
            <form action="../../controllers/OrdersController.php" method="POST" style="display: inline;">
                <button type="submit" class="btn btn-danger" name="orders">Orders List</button>
            </form>
        </div>
    </header>

    <div class="container mt-5">
        <h1 class="mb-4">Add a New Book</h1>
        <form action="../../controllers/AddBooksController.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="For Title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" placeholder="Author" name="author" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description"
                          required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" placeholder="For Price" name="price" required>
            </div>
            <div class="form-group">
                <label for="file">Book Cover Image</label>
                <input type="file" class="form-control-file" id="file" name="img" required>
            </div>
            <input type="submit" value="Add Book" name="addBook">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
<?php
//else:
//    header("Location: AdminLogin.php");
endif;
?>
