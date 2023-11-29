<?php
// Kelompok 2 - 2DAYNEWS
// Final Project

if (!isset($_GET['id'])) {
    header("location: ../../dashboard/posts.php");
    exit;
}

require '../functions.php';

$id = $_GET['id'];

$posts = query("SELECT posts.id, img, judul, body, publish, category.nama_category, author.nama_author
  FROM posts 
  JOIN category ON posts.category_id = category.id
  JOIN author ON posts.author_id = author.id
  WHERE posts.id = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>2DAYNEWS | Details</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../img/2daynews.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body class="bg-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="overlay position-relative bg-light">
                    <div class="">
                        <img class="img-fluid w-100 mb-3" src="../../img/<?= $posts['img'] ?>" style="object-fit: cover;">
                        <a href="#"><?= $posts['nama_category'] ?></a>
                        <span class="px-1">/</span>
                        <span><?= date("F d, Y", strtotime($posts['publish'])); ?></span>
                    </div>
                    <div class="mb-3">
                        <a>By <?= $posts['nama_author']; ?></a>
                    </div>
                    <div class="mb-3">
                        <h3 class="mb-3"><?= $posts['judul'] ?></h3>
                        <p style="text-align: justify;"><?= nl2br($posts['body']); ?></p>
                    </div>

                    <a href="../../dashboard/posts.php">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
</body>

</html>