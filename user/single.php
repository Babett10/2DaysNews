<?php
// Kelompok 2 - 2DAYNEWS
// Final Project

require '../php/functions.php';

if (isset($_POST['add_comment'])) {
    if (add_comment($_POST) > 0) {
        echo "<script>
            alert('Data Added successfully!');
            document.location.href = 'index.php';
          </script>";
    } else {
        echo "<script>
            alert('Data Failed to add!');
            document.location.href = 'index.php';
          </script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah kolom komentar tidak kosong
    if (empty($_POST["add_comment"])) {
        $error_message = "Kolom komentar tidak boleh kosong.";
    }
}

$id = $_GET['id'];
$posts = query("SELECT posts.id, img, judul, body, publish, category_id, category.nama_category, author_id, author.nama_author
FROM posts 
JOIN category ON posts.category_id = category.id
JOIN author ON posts.author_id = author.id
WHERE posts.id = $id")[0];

$breakingposts = query("SELECT posts.id, judul, body, img, publish, category.nama_category
FROM posts
JOIN category ON posts.category_id = category.id
JOIN author ON posts.author_id = author.id
ORDER BY publish DESC
LIMIT 5");

$comments = query("SELECT id,parent_id,comment,tanggal,username,post_id,user_id FROM `comment` 
JOIN user ON comment.user_id = user.id_user WHERE post_id = $id AND parent_id = 0 ;");

session_start();
$userr = $_SESSION["username"];

$idusers = query("SELECT id_user FROM `user` WHERE username = '$userr'");
foreach ($idusers as $iduser) :
endforeach;

if (!isset($_SESSION["username"])) {
    header("Location: ../login.php");
    exit;
}
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
    <!-- Topbar Start -->
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

    <!-- Breadcrumb Start -->
    <div class="container-fluid py-2 px-lg-5 mt-3">
        <div class="row">
            <div class="col-lg-12">
                <nav class="breadcrumb bg-transparent m-0 p-0">
                    <a class="breadcrumb-item" href="index.php">Home</a>
                    <a class="breadcrumb-item" href="category.php">Category</a>
                    <a class="breadcrumb-item" href="<?= $posts['nama_category']; ?>_news.php"><?= $posts['nama_category']; ?></a>
                    <span class="breadcrumb-item active"><?= $posts['judul']; ?></span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3 px-lg-5 ">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="../img/<?= $posts['img']; ?>" style="object-fit: cover;">
                    <div class="overlay position-relative bg-light">
                        <div class="mb-3">
                            <a href="<?= $posts['nama_category']; ?>_news.php"><?= $posts['nama_category']; ?></a>
                            <span class="px-1">/</span>
                            <span><?= date("F d, Y", strtotime($posts['publish'])); ?></span>
                        </div>
                        <div class="mb-3">
                            <a><?php echo "By " . $posts['nama_author']; ?></a>
                        </div>
                        <div>
                            <h3 class="mb-3"><?= $posts['judul']; ?></h3>
                            <p style="text-align: justify;"><b>2DayNews</b> - <?= nl2br($posts['body']); ?></p>
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->
                <!-- Comment List Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h3 class="mb-4">Comments</h3>
                    <?php foreach ($comments as $comment) : ?>    
                        <div class="media">
                            <img src="../img/user.png" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><a href=""><?= $comment['username']; ?></a> <small>Posted on <i><?= $comment['tanggal']; ?></i></small></h6>
                                <p><?= $comment['comment']; ?></p>
                                <!-- reply form -->
                                <form action="" method="post">
                                    <div class="form-group">             
                                        <input type="text" class="form-control" name="user_id" value="<?php echo $iduser['id_user']; ?>" hidden>
                                    </div>
                                    <div class="form-group">
                                        <!-- parent id -->
                                        <input type="number" class="form-control" name="parent_id" value="<?php echo $comment['id']; ?>" hidden>
                                    </div>
                                    <div class="form-group">
                                        <!-- tanggal -->
                                        <input type="text" class="form-control" name="tanggal" value="<?php echo date('Y-m-d H:i:s'); ?>" hidden>
                                    </div>
                                    <div class="form-group">
                                        <!-- post id -->
                                        <input type="number" class="form-control" name="post_id" value="<?= $id;?>" hidden>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="comment" cols="30"  rows="1" class="form-control"></textarea>
                                    </div>
                                    <button class="btn btn-sm btn-outline-secondary" type="submit" name="add_comment">Reply</button>  
                                </form>
                                <!-- close reply form -->

                                    <?php
                                    $replys = query("SELECT id,parent_id,comment,tanggal,username FROM `comment` 
                                    JOIN user ON comment.user_id = user.id_user WHERE parent_id = $comment[id];");
                                    foreach ($replys as $reply) : ?>    
                                        <div class="media mt-4">
                                            <img src="../img/user.png" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                            <div class="media-body">
                                                <h6><a href=""><?= $reply['username']; ?></a> <small><i><?= $reply['tanggal']; ?></i></small></h6>
                                                <p><?= $reply['comment']; ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach;  ?>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h3 class="mb-4">Leave a comment</h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Comment as <b><?= $userr;?></b></label>
                            <input type="text" class="form-control" name="user_id" value="<?php echo $iduser['id_user']; ?>" hidden>
                        </div>
                        <div class="form-group">
                            <!-- parent id -->
                            <input type="number" class="form-control" name="parent_id" value="0" hidden>
                        </div>
                        <div class="form-group">
                            <!-- tanggal -->
                            <input type="text" class="form-control" name="tanggal" value="<?php echo date('Y-m-d H:i:s'); ?>" hidden>
                        </div>
                        <div class="form-group">
                            <!-- post id -->
                            <input type="number" class="form-control" name="post_id" value="<?= $id;?>" hidden>
                        </div>
                        <div class="form-group">
                            <label for="comment">Message *</label>
                            <textarea name="comment" cols="30" rows="5" class="form-control" id="comment"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <input type="submit" value="Leave a comment" id="replyButton" name="add_comment" class="btn btn-primary font-weight-semi-bold py-2 px-3" disabled>
                        </div>
                    </form>
                </div>
                <!-- Comment Form End -->
            </div>

            <!-- popular news -->
            <div class="col-lg-4 pt-3 pt-lg-0">
                <!-- Popular News Start -->
                <div class="pb-3">
                    <div class="bg-dark py-2 px-4 mb-3">
                        <h3 class="m-0" style="color: white;">Breaking News</h3>
                    </div>

                    <?php
                    foreach ($breakingposts as $Bpost) : ?>
                        <div class="d-flex mb-3">
                            <img src="../img/<?= $Bpost['img']; ?>" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="<?= $Bpost['nama_category']; ?>_news.php"><?= $Bpost['nama_category']; ?></a>
                                    <span class="px-1">/</span>
                                    <span><?= date("F d, Y", strtotime($Bpost['publish'])); ?></span>
                                </div>
                                <a class="h6 m-0" href="single.php?id=<?= $Bpost['id'] ?>"><?= $Bpost['judul']; ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Popular News End -->
                <!-- Social Follow Start -->
                <div class="pb-3">
                    <div class="bg-dark py-2 px-4 mb-3">
                        <h3 class="m-0" style="color: white;">Follow Us</h3>
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

        function checkForm() {
            var comment = document.getElementById('comment').value;
            var replyButton = document.getElementById('replyButton');

            if (comment.trim() !== '') {
            // Form is filled, enable the reply button
            replyButton.removeAttribute('disabled');
            } else {
            // Form is not completely filled, disable the reply button
            replyButton.setAttribute('disabled', 'true');
            }
        }

         document.getElementById('comment').addEventListener('input', checkForm);

     }
    </script>
</body>

</html>