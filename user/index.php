<?php
// Kelompok 2 - 2DAYNEWS
// Final Project

require '../php/functions.php';

$posts = query("SELECT posts.id, judul, body, img, publish, category.nama_category, author.nama_author
FROM posts
JOIN category ON posts.category_id = category.id
JOIN author ON posts.author_id = author.id
ORDER BY posts.id ASC
LIMIT 10");

$breakingposts = query("SELECT posts.id, judul, body, img, publish, category.nama_category
FROM posts
JOIN category ON posts.category_id = category.id
JOIN author ON posts.author_id = author.id
ORDER BY publish DESC
LIMIT 4");

if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];
    $posts = cari($keyword);
}

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>2DAYNEWS | Home</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/2daynews.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container-fluid nav-observer">
            <div class="row align-items-center bg-primary px-lg-5">
                <div class="col-12 col-md-8">
                    <div class="d-flex justify-content-between">
                        <div class="d-inline-flex py-2" style="width: 200px; font-size:18px;"><span class="text-light text-uppercase" style="font-weight: bolder;">Breaking&nbsp;News</span></div>
                        <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 150px); padding-left: 90px; padding-right: 70px;">
                            <?php foreach ($breakingposts as $Bpost) : ?>
                                <div class="text-truncate"><a class="text-white" href="single.php?id=<?= $Bpost['id']; ?>"><?= $Bpost['judul'] ?></a></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-right d-none d-md-block text-white">
                    <?php
                    date_default_timezone_set("Asia/jakarta");
                    ?>
                    <?php echo date("l, d M Y"); ?>
                    <span id="jam"></span>
                </div>
            </div>
        </div>

        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">2Day</span>News</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.php" class="nav-item nav-link active ">Home</a>
                        <a href="category.php" class="nav-item nav-link">Category</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <a href="logout.php" class="nav-item nav-link">Logout</a>
                    </div>
                    <div class="input-group" style="width: 100%; max-width: 300px;">
                        <form action="" method="POST">
                            <div class="input-group-append">
                                <input style="width: 260px;" type="text" name="keyword" class="form-control" placeholder="search" value="<?= isset($keyword) ? $keyword : '' ?>">
                                <button type="submit" name="cari" class="input-group-text text-secondary"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main News Slider Start -->
    <?php $isSearching = isset($_POST["cari"]); ?>
    <?php if (!$isSearching) : ?>
        <div class="container-fluid py-3 px-lg-5 mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        <?php foreach ($breakingposts as $Bpost) : ?>
                            <div class="position-relative overflow-hidden" style="height: 750px;">
                                <img class="img-fluid h-100" src="../img/<?= $Bpost['img']; ?>" style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-1">
                                        <a class="text-white"><?= $Bpost['nama_category']; ?></a>
                                        <span class="px-2 text-white">/</span>
                                        <a class="text-white"><?= date("F d, Y", strtotime($Bpost['publish'])); ?></a>
                                    </div>
                                    <a class="h2 m-0 text-white font-weight-bold" href="single.php?id=<?= $Bpost['id']; ?>"><?= $Bpost['judul']; ?></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3 px-lg-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-dark py-2 px-4 mb-3">
                            <h3 class="text-white m-0">All News</h3>
                            <a class="text-white font-weight-medium text-decoration-none" href="all_news.php">View All</a>
                        </div>
                    </div>

                    <?php if (empty($posts)) : ?>
                        <h1 style="margin: auto;">Data tidak ditemukan</h1>
                    <?php else : ?>
                        <?php foreach ($posts as $post) :
                            $text = explode(' ', $post['body']);
                            $textcut = implode(' ', array_slice($text, 0, 20));
                        ?>
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="../img/<?= $post['img']; ?>" style="width: 450px; height: 250px; object-fit: cover;">
                                    <div class="overlay position-relative bg-light">
                                        <div class="mb-2" style="font-size: 14px;">
                                            <a href="<?= $post['nama_category']; ?>_news.php"><?= $post['nama_category']; ?></a>
                                            <span class="px-1">/</span>
                                            <span><?= date("F d, Y", strtotime($post['publish'])); ?></span>
                                        </div>
                                        <a class="h4" href="single.php?id=<?= $post['id']; ?>"><?= $post['judul']; ?></a>
                                        <p class="m-0"><?php echo $textcut . "..." ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- breaking news -->
            <div class="col-lg-4 pt-3 pt-lg-0">
                <!-- Hot News Start -->
                <div class="pb-3">
                    <div class="bg-dark py-2 px-4 mb-3">
                        <h3 class="m-0 text-white">Breaking News</h3>
                    </div>

                    <?php foreach ($breakingposts as $Bpost) :
                        $textbreaking = explode(' ', $Bpost['body']);
                        $textbreakingcut = implode(' ', array_slice($textbreaking, 0, 10));
                    ?>
                        <div class="d-flex mb-3">
                            <img src="../img/<?= $Bpost['img']; ?>" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="<?= $Bpost['nama_category']; ?>_news.php<"><?= $Bpost['nama_category']; ?></a>
                                    <span class="px-1">/</span>
                                    <span><?= date("F d, Y", strtotime($Bpost['publish'])); ?></span>
                                </div>
                                <a class="h6 m-0" href="single.php?id=<?= $Bpost['id'] ?>"><?php echo $textbreakingcut . "..." ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Hot News End -->
                <!-- Category Start -->
                <div class="pb-3">
                    <div class="bg-dark py-2 px-4 mb-3">
                        <h3 class="m-0 text-white">Category</h3>
                    </div>
                    <div class="d-flex mb-2">
                        <a href="politics_news.php" class="h6 bg-light d-block w-50 py-2 px-3 text-dark text-decoration-none mr-2">Politics</a>
                        <a href="sport_news.php" class="h6 bg-light d-block w-50 py-2 px-3 text-dark text-decoration-none mr-2">Sport</a>
                    </div>
                    <div class="d-flex mb-2">
                        <a href="e-sport_news.php" class="h6 bg-light d-block w-50 py-2 px-3 text-dark text-decoration-none mr-2">E-Sport</a>
                        <a href="technology_news.php" class="h6 bg-light d-block w-50 py-2 px-3 text-dark text-decoration-none mr-2">Technology</a>
                    </div>
                    <div class="d-flex mb-2">
                        <a href="film_news.php" class="h6 bg-light d-block w-50 py-2 px-3 text-dark text-decoration-none mr-2">Film</a>
                        <a href="otomotif_news.php" class="h6 bg-light d-block w-50 py-2 px-3 text-dark text-decoration-none mr-2">Otomotif</a>
                    </div>
                </div>
                <!-- Category End -->
                <!-- Social Follow Start -->
                <div class="pb-3">
                    <div class="bg-dark py-2 px-4 mb-3">
                        <h3 class="m-0 text-white">Follow Us</h3>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #39569E;">
                            <small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #52AAF4;">
                            <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #0185AE;">
                            <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #C8359D;">
                            <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #DC472E;">
                            <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #1AB7EA;">
                            <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                </div>
                <!-- Social Follow End -->
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

    <!-- Footer Start -->
    <footer>
        <div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-5">
                    <a href="index.php" class="navbar-brand">
                        <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">2Day</span>News</h1>
                    </a>
                    <p>Dapatkan informasi berita terupdate dan terpopular serta akurat hanya disini</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 ml-auto">
                    <h4 class="font-weight-bold mb-4">Media Partner</h4>
                    <div class="d-flex flex-wrap m-n1">
                        <a><img src="../img/detik.png" alt="1" style="margin:5px;"></a>
                        <a><img src="../img/kompas.png" alt="2" style="margin:5px;"></a>
                        <a><img src="../img/liputan6.png" alt="3" style="margin:5px;"></a>
                        <a><img src="../img/cnn.png" alt="4" style="margin:5px;"></a>
                        <a><img src="../img/tribun.png" alt="5" style="margin:5px;"></a>
                        <a><img src="../img/cnbc.png" alt="6" style="margin:5px;"></a>
                        <a><img src="../img/bola1.png" alt="14" style="margin:5px;"></a>
                        <a><img src="../img/bola.png" alt="7" style="margin:5px;"></a>
                        <a><img src="../img/goal.png" alt="8" style="margin:5px;"></a>
                        <a><img src="../img/tempo.png" alt="9" style="margin:5px;"></a>
                        <a><img src="../img/times.png" alt="10" style="margin:5px;"></a>
                        <a><img src="../img/jpnn.png" alt="11" style="margin:5px;"></a>
                        <a><img src="../img/jawapos.png" alt="12" style="margin:5px;"></a>
                        <a><img src="../img/okzone.png" alt="13" style="margin:5px;"></a>
                        <a><img src="../img/suara.png" alt="14" style="margin:5px;"></a>
                        <a><img src="../img/kumparan.png" alt="14" style="margin:5px;"></a>
                        <a><img src="../img/sindonews.png" alt="14" style="margin:5px;"></a>
                        <a><img src="../img/idn.png" alt="14" style="margin:5px;"></a>
                        <a><img src="../img/INews.png" alt="14" style="margin:5px;"></a>
                        <a><img src="../img/merdeka.png" alt="14" style="margin:5px;"></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 ml-auto">
                    <h4 class="font-weight-bold mb-4">Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary" href="index.php"><i class="fa fa-angle-right text-dark mr-2"></i>Home</a>
                        <a class="text-secondary" href="category.php"><i class="fa fa-angle-right text-dark mr-2"></i>Category</a>
                        <a class="text-secondary" href="contact.php"><i class="fa fa-angle-right text-dark mr-2"></i>Contact</a>
                        <a class="text-secondary" href="about_us.php"><i class="fa fa-angle-right text-dark mr-2"></i>About us</a>
                        <a class="text-secondary" href="logout.php"><i class="fa fa-angle-right text-dark mr-2"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4 px-sm-3 px-md-5">
            <p class="m-0 text-center">
                &copy; <a class="font-weight-bold" href="#">2DAYNEWS</a>. All Rights Reserved.

                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed by <a class="font-weight-bold" href="https://github.com/Babett10/FinalProject">Kelompok 2</a>
            </p>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../mail/jqBootstrapValidation.min.js"></script>
    <script src="../mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            jam();
            observer()
        }

        function jam() {
            var e = document.getElementById('jam'),
                d = new Date(),
                h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML = h + ':' + m + ':' + s;

            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }

        function observer() {
            const nav = document.querySelector(".nav-observer")
            const intersection = new IntersectionObserver((entries) => {
                const [entry] = entries

                if (entry.isIntersecting) {
                    document.querySelector(".navbar").classList.remove("fixed-top")
                } else {
                    document.querySelector(".navbar").classList.add("fixed-top")
                }
            }, {
                threshold: 1,
            })

            intersection.observe(nav)
        }
    </script>
</body>

</html>