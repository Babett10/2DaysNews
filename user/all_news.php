<?php
// Kelompok 2 - 2DAYNEWS
// Final Project

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
    <title>2DAYNEWS | View All</title>
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
                        <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 150px); padding-left: 90px;">
                            <div class="text-truncate"><a class="text-white" href="#">Kritik Netizen untuk Performa Asnawi di Timnas Indonesia: Main Grasak Grusuk, Menurun Sejak Gaul Sama Artis</a></div>
                            <div class="text-truncate"><a class="text-white" href="#">4 Bukti Meta dan Medsosnya Tak Netral di Konflik Israel-Palestina</a></div>
                            <div class="text-truncate"><a class="text-white" href="#">Tecno Spark 20C Rilis dengan Fitur "Dynamic Island" Ala iPhone</a></div>
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
                        <input type="text" class="form-control" placeholder="search">
                        <div class="input-group-append">
                            <button class="input-group-text text-secondary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3 px-lg-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-dark py-2 px-4 mb-3">
                            <h3 class="text-white m-0">All News</h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="../img/news-500x280-1.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="#">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4" href="single.php">Tecno Spark 20C Rilis dengan Fitur "Dynamic Island" ala iPhone</a>
                                <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="../img/news-500x280-3.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="#">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4" href="">Est stet amet ipsum stet clita rebum duo</a>
                                <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="../img/news-500x280-5.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="#">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4" href="">Est stet amet ipsum stet clita rebum duo</a>
                                <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="../img/news-500x280-6.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4" href="">Est stet amet ipsum stet clita rebum duo</a>
                                <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                            </div>
                        </div>
                    </div>
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
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>About</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Advertise</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Privacy & policy</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Terms & conditions</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Contact</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-4 px-sm-3 px-md-5">
                <p class="m-0 text-center">
                    &copy; <a class="font-weight-bold" href="#">2DAYNEWS</a>. All Rights Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed by <a class="font-weight-bold" href="https://htmlcodex.com">Kelompok 2</a>
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