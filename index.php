<?php
// Kelompok 2 - 2DAYNEWS
// Final Project

require 'php/functions.php';

$posts = query("SELECT posts.id, judul, body, img, publish, category.nama_category, author.nama_author
FROM posts
JOIN category ON posts.category_id = category.id
JOIN author ON posts.author_id = author.id
ORDER BY posts.id ASC
LIMIT 10");

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
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Main News Slider Start -->
    <div class="container-fluid py-3 px-lg-5 mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                    <div class="position-relative overflow-hidden" style="height: 750px;">
                        <img class="img-fluid h-100" src="img/news-700x435-1.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1">
                                <a class="text-white">Sports</a>
                                <span class="px-2 text-white">/</span>
                                <a class="text-white">January 01, 2045</a>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold" href="#">Kritik Netizen untuk Performa Asnawi di Timnas Indonesia: Main Grasak Grusuk, Menurun Sejak Gaul Sama Artis</a>
                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 750px;">
                        <img class="img-fluid h-100" src="img/news-700x435-2.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1">
                                <a class="text-white" href="">Technology</a>
                                <span class="px-2 text-white">/</span>
                                <a class="text-white" href="detail.php">January 01, 2045</a>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold" href="">4 Bukti Meta dan Medsosnya Tak Netral di Konflik Israel-Palestina</a>
                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 750px;">
                        <img class="img-fluid h-100" src="img/news-500x280-1.jpg" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1">
                                <a class="text-white" href="">Technology</a>
                                <span class="px-2 text-white">/</span>
                                <a class="text-white" href="detail.php">January 01, 2045</a>
                            </div>
                            <a class="h2 m-0 text-white font-weight-bold" href="single.php">Tecno Spark 20C Rilis dengan Fitur "Dynamic Island" ala iPhone</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3 px-lg-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between bg-dark py-2 px-4 mb-3">
                            <h3 class="text-white m-0">All News</h3>
                            <a class="text-white font-weight-medium text-decoration-none" href="#">View All</a>
                        </div>
                    </div>

                    <?php foreach ($posts as $post) : 
                        $text = explode(' ', $post['body']);
                        $textcut = implode(' ', array_slice($text, 0, 20));
                    ?>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="img/<?= $post['img'];?>" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="#"><?= $post['nama_category'];?></a>
                                    <span class="px-1">/</span>
                                    <span><?= $post['publish'];?></span>
                                </div>
                                <a class="h4" href="single.php?id=<?= $post['id']; ?>"><?= $post['judul'];?></a>
                                <p class="m-0"><?php echo $textcut ."..."?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
            </div>
            <!-- breaking news -->
            <div class="col-lg-4 pt-3 pt-lg-0">
                <!-- Hot News Start -->
                <div class="pb-3">
                    <div class="bg-dark py-2 px-4 mb-3">
                        <h3 class="m-0 text-white">Breaking News</h3>
                    </div>
                    <?php
                    $breakingposts = query("SELECT posts.id, judul, body, img, publish, category.nama_category
                    FROM posts
                    JOIN category ON posts.category_id = category.id
                    JOIN author ON posts.author_id = author.id
                    ORDER BY publish DESC
                    LIMIT 4");
                     foreach ($breakingposts as $Bpost) : 
                        $textbreaking = explode(' ', $Bpost['body']);
                        $textbreakingcut = implode(' ', array_slice($textbreaking, 0, 10));
                    ?>   
                    <div class="d-flex mb-3">
                        <img src="img/<?= $Bpost['img'];?>" style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                            <div class="mb-1" style="font-size: 13px;">
                                <a href="#"><?= $Bpost['nama_category'];?></a>
                                <span class="px-1">/</span>
                                <span><?= $Bpost['publish'];?></span>
                            </div>
                            <a class="h6 m-0" href="single.php?id=<?= $Bpost['id']?>"><?php echo $textbreakingcut ."..."?></a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- Hot News End -->
                <!-- Category Start -->
                <div class="pb-3">
                    <div class="bg-dark py-2 px-4 mb-3">
                        <h3 class="m-0 text-white">Categories</h3>
                    </div>
                    <div class="d-flex mb-2">
                        <a href="" class="h6 bg-light d-block w-50 py-2 px-3 text-dark text-decoration-none mr-2">Technology</a>
                        <a href="" class="h6 bg-light d-block w-50 py-2 px-3 text-dark text-decoration-none mr-2">Sports</a>
                    </div>
                    <div class="d-flex mb-2">
                        <a href="" class="h6 bg-light d-block w-50 py-2 px-3 text-dark text-decoration-none mr-2">E-Sports</a>
                        <a href="" class="h6 bg-light d-block w-50 py-2 px-3 text-dark text-decoration-none mr-2">Politics</a>
                    </div>
                    <div class="d-flex mb-2">
                        <a href="" class="h6 bg-light d-block w-50 py-2 px-3 text-dark text-decoration-none mr-2">Film</a>
                        <a href="" class="h6 bg-light d-block w-50 py-2 px-3 text-dark text-decoration-none mr-2">Otomotif</a>
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
    <?php include 'footer.php'; ?>
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