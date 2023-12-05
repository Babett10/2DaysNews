<?php
// Kelompok 2 - 2DAYNEWS
// Final Project

require 'php/functions.php';

$sports = query("SELECT posts.id, judul, body, img, publish, category.nama_category
FROM posts
JOIN category ON posts.category_id = category.id
WHERE nama_category = 'Sport' LIMIT 3");

$esports = query("SELECT posts.id, judul, body, img, publish, category.nama_category
FROM posts
JOIN category ON posts.category_id = category.id
WHERE nama_category = 'E-Sport' LIMIT 3");

$film = query("SELECT posts.id, judul, body, img, publish, category.nama_category
FROM posts
JOIN category ON posts.category_id = category.id
WHERE nama_category = 'FIlm' LIMIT 3");

$breakingposts = query("SELECT posts.id, judul, body, img, publish, category.nama_category
FROM posts
JOIN category ON posts.category_id = category.id
JOIN author ON posts.author_id = author.id
ORDER BY publish DESC
LIMIT 4");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>2DAYNEWS | Category</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/2daynews.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <header>
        <div class="container-fluid nav-observer">
            <div class="row align-items-center bg-primary px-lg-5">
                <div class="col-12 col-md-8">
                    <div class="d-flex justify-content-between">
                        <div class="d-inline-flex py-2" style="width: 200px; font-size:18px;"><span class="text-light text-uppercase" style="font-weight: bolder;">Breaking&nbsp;News</span></div>
                        <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 150px); padding-left: 90px; padding-right: 45px">
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
                        <a href="index.php" class="nav-item nav-link  ">Home</a>
                        <a href="category.php" class="nav-item nav-link active">Category</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <a href="login.php" class="nav-item nav-link">Login</a>
                    </div>
                    <div class="input-group" style="width: 100%; max-width: 300px;">
                        <input type="text" class="form-control" placeholder="search">
                        <div class="input-group-append">
                            <button class="input-group-text text-secondary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- Topbar End -->
    <div class="container-fluid py-3 px-lg-5">
        <div class="row">
            <div class="col-lg-6 py-3">
                <div class="bg-dark py-2 px-4 mb-3">
                    <h3 class="m-0" style="color: white;">Entertainment</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/news-500x280-1.jpg" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="">Technology</a>
                                <span class="px-1">/</span>
                                <span>January 01, 2023</span>
                            </div>
                            <a class="h4 m-0" href="">Samett amet ipsum loream</a>
                        </div>
                    </div>
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/news-500x280-2.jpg" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="">Technology</a>
                                <span class="px-1">/</span>
                                <span>January 01, 2045</span>
                            </div>
                            <a class="h4 m-0" href="">Sancts amet sed ipsum lorem</a>
                        </div>
                    </div>
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/news-500x280-3.jpg" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="">Technology</a>
                                <span class="px-1">/</span>
                                <span>January 01, 2045</span>
                            </div>
                            <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                        </div>
                    </div>
                </div>
                <div class="bg-dark py-2 px-4 mb-3 mt-3 text-center">
                    <a href="entertainment_news.php" style="color: white;">View All</a>
                </div>
            </div>

            <div class="col-lg-6 py-3">
                <div class="bg-dark py-2 px-4 mb-3">
                    <h3 class="m-0" style="color: white;">Sport</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    <?php foreach ($sports as $sport) :
                        $text = explode(' ', $sport['judul']);
                        $textcut = implode(' ', array_slice($text, 0, 4));
                    ?>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/<?= $sport['img']; ?>" style="width: 300px; height: 200px; object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="<?= $sport['nama_category']; ?>_news.php"><?= $sport['nama_category']; ?></a>
                                    <span class="px-1">/</span>
                                    <span><?= date("F d, Y", strtotime($sport['publish'])); ?></span>
                                </div>
                                <a class="h4 m-0" href="single.php?id=<?= $sport['id'] ?>"><?= $textcut . "..." ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="bg-dark py-2 px-4 mb-3 mt-3 text-center">
                    <a href="sport_news.php" style="color: white;">View All</a>
                </div>
            </div>

            <div class="col-lg-6 py-3">
                <div class="bg-dark py-2 px-4 mb-3">
                    <h3 class="m-0" style="color: white;">E-Sport</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    <?php foreach ($esports as $esport) :
                        $text = explode(' ', $esport['judul']);
                        $textcut = implode(' ', array_slice($text, 0, 4));
                    ?>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/<?= $esport['img']; ?>" style="width: 300px; height: 200px; object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="<?= $esport['nama_category']; ?>_news.php"><?= $esport['nama_category']; ?></a>
                                    <span class="px-1">/</span>
                                    <span><?= date("F d, Y", strtotime($esport['publish'])); ?></span>
                                </div>
                                <a class="h4 m-0" href="single.php?id=<?= $esport['id'] ?>"><?= $textcut . "..." ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="bg-dark py-2 px-4 mb-3 mt-3 text-center">
                    <a href="e-sport_news.php" style="color: white;">View All</a>
                </div>
            </div>

            <div class="col-lg-6 py-3">
                <div class="bg-dark py-2 px-4 mb-3">
                    <h3 class="m-0" style="color: white;">Politics</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/news-500x280-1.jpg" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="">Technology</a>
                                <span class="px-1">/</span>
                                <span>January 01, 2023</span>
                            </div>
                            <a class="h4 m-0" href="">Samett amet ipsum loream</a>
                        </div>
                    </div>
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/news-500x280-2.jpg" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="">Technology</a>
                                <span class="px-1">/</span>
                                <span>January 01, 2045</span>
                            </div>
                            <a class="h4 m-0" href="">Sancts amet sed ipsum lorem</a>
                        </div>
                    </div>
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/news-500x280-3.jpg" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="">Technology</a>
                                <span class="px-1">/</span>
                                <span>January 01, 2045</span>
                            </div>
                            <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                        </div>
                    </div>
                </div>
                <div class="bg-dark py-2 px-4 mb-3 mt-3 text-center">
                    <a href="politics_news.php" style="color: white;">View All</a>
                </div>
            </div>

            <div class="col-lg-6 py-3">
                <div class="bg-dark py-2 px-4 mb-3">
                    <h3 class="m-0" style="color: white;">Film</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    <?php foreach ($film as $movie) :
                        $text = explode(' ', $movie['judul']);
                        $textcut = implode(' ', array_slice($text, 0, 4));
                    ?>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/<?= $movie['img']; ?>" style="width: 300px; height: 200px; object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="<?= $movie['nama_category']; ?>_news.php"><?= $movie['nama_category']; ?></a>
                                    <span class="px-1">/</span>
                                    <span><?= date("F d, Y", strtotime($movie['publish'])); ?></span>
                                </div>
                                <a class="h4 m-0" href="single.php?id=<?= $movie['id'] ?>"><?= $textcut . "..." ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="bg-dark py-2 px-4 mb-3 mt-3 text-center">
                    <a href="film_news.php" style="color: white;">View All</a>
                </div>
            </div>

            <div class="col-lg-6 py-3">
                <div class="bg-dark py-2 px-4 mb-3">
                    <h3 class="m-0" style="color: white;">Otomotif</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/news-500x280-1.jpg" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="">Technology</a>
                                <span class="px-1">/</span>
                                <span>January 01, 2023</span>
                            </div>
                            <a class="h4 m-0" href="">Samett amet ipsum loream</a>
                        </div>
                    </div>
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/news-500x280-2.jpg" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="">Technology</a>
                                <span class="px-1">/</span>
                                <span>January 01, 2045</span>
                            </div>
                            <a class="h4 m-0" href="">Sancts amet sed ipsum lorem</a>
                        </div>
                    </div>
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/news-500x280-3.jpg" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="">Technology</a>
                                <span class="px-1">/</span>
                                <span>January 01, 2045</span>
                            </div>
                            <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                        </div>
                    </div>
                </div>
                <div class="bg-dark py-2 px-4 mb-3 mt-3 text-center">
                    <a href="otomotif_news.php" style="color: white;">View All</a>
                </div>
            </div>
        </div>
    </div>
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
                        <a><img src="img/detik.png" alt="1" style="margin:5px;"></a>
                        <a><img src="img/kompas.png" alt="2" style="margin:5px;"></a>
                        <a><img src="img/liputan6.png" alt="3" style="margin:5px;"></a>
                        <a><img src="img/cnn.png" alt="4" style="margin:5px;"></a>
                        <a><img src="img/tribun.png" alt="5" style="margin:5px;"></a>
                        <a><img src="img/cnbc.png" alt="6" style="margin:5px;"></a>
                        <a><img src="img/bola1.png" alt="14" style="margin:5px;"></a>
                        <a><img src="img/bola.png" alt="7" style="margin:5px;"></a>
                        <a><img src="img/goal.png" alt="8" style="margin:5px;"></a>
                        <a><img src="img/tempo.png" alt="9" style="margin:5px;"></a>
                        <a><img src="img/times.png" alt="10" style="margin:5px;"></a>
                        <a><img src="img/jpnn.png" alt="11" style="margin:5px;"></a>
                        <a><img src="img/jawapos.png" alt="12" style="margin:5px;"></a>
                        <a><img src="img/okzone.png" alt="13" style="margin:5px;"></a>
                        <a><img src="img/suara.png" alt="14" style="margin:5px;"></a>
                        <a><img src="img/kumparan.png" alt="14" style="margin:5px;"></a>
                        <a><img src="img/sindonews.png" alt="14" style="margin:5px;"></a>
                        <a><img src="img/idn.png" alt="14" style="margin:5px;"></a>
                        <a><img src="img/INews.png" alt="14" style="margin:5px;"></a>
                        <a><img src="img/merdeka.png" alt="14" style="margin:5px;"></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 ml-auto">
                    <h4 class="font-weight-bold mb-4">Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary" href="index.php"><i class="fa fa-angle-right text-dark mr-2"></i>Home</a>
                        <a class="text-secondary" href="category.php"><i class="fa fa-angle-right text-dark mr-2"></i>Category</a>
                        <a class="text-secondary" href="contact.php"><i class="fa fa-angle-right text-dark mr-2"></i>Contact</a>
                        <a class="text-secondary" href="login.php"><i class="fa fa-angle-right text-dark mr-2"></i>Login</a>
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
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
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