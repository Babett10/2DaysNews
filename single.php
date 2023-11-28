<?php
// Kelompok 2 - 2DAYNEWS
// Final Project

require 'php/functions.php';

$id = $_GET['id'];
$posts = query("SELECT posts.id, img, judul, body, publish, category_id, category.nama_category, author_id, author.nama_author
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
    <?php include 'header.php'; ?>
    <!-- Topbar End -->

    <!-- Breadcrumb Start -->
    <div class="container-fluid py-2 px-lg-5 mt-3">
        <div class="row">
            <div class="col-lg-12">
                <nav class="breadcrumb bg-transparent m-0 p-0">
                    <a class="breadcrumb-item" href="index.php">Home</a>
                    <a class="breadcrumb-item" href="category.php">Category</a>
                    <a class="breadcrumb-item" href="#"><?= $posts['nama_category'];?></a>
                    <span class="breadcrumb-item active"><?= $posts['judul'];?></span>
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
                    <img class="img-fluid w-100" src="img/<?= $posts['img'];?>" style="object-fit: cover;">
                    <div class="overlay position-relative bg-light">
                        <div class="mb-3">
                            <a href="#"><?= $posts['nama_category'];?></a>
                            <span class="px-1">/</span>
                            <span ><?= $posts['publish'];?></span>
                        </div>
                        <div class="mb-3">
                            <a><?php echo "By ".$posts['nama_author'];?></a>
                        </div>
                        <div>
                            <h3 class="mb-3"><?= $posts['judul'];?></h3>
                            <p><?= $posts['body'];?></p>
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->
                <!-- Comment List Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h3 class="mb-4">3 Comments</h3>
                    <div class="media mb-4">
                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                        <div class="media-body">
                            <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
                                Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
                                consetetur at sit.</p>
                            <button class="btn btn-sm btn-outline-secondary">Reply</button>
                        </div>
                    </div>
                    <div class="media">
                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                        <div class="media-body">
                            <h6><a href="">John Doe</a> <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
                                Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
                                consetetur at sit.</p>
                            <button class="btn btn-sm btn-outline-secondary">Reply</button>
                            <div class="media mt-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6><a href="">John Doe</a> <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                                    <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor
                                        labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed
                                        eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet
                                        ipsum diam tempor consetetur at sit.</p>
                                    <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h3 class="mb-4">Leave a comment</h3>
                    <form>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <input type="submit" value="Leave a comment" class="btn btn-primary font-weight-semi-bold py-2 px-3">
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
                    $breakingposts = query("SELECT posts.id, judul, body, img, publish, category.nama_category
                    FROM posts
                    JOIN category ON posts.category_id = category.id
                    JOIN author ON posts.author_id = author.id
                    ORDER BY publish DESC
                    LIMIT 5");
                     foreach ($breakingposts as $Bpost) : 
                        $textbreaking = explode(' ', $Bpost['body']);
                        $textbreakingcut = implode(' ', array_slice($textbreaking, 0, 10));
                    ?>   
                        <div class="d-flex mb-3">
                            <img src="img/<?= $Bpost['img'];?>" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href=""><?= $Bpost['nama_category'];?></a>
                                    <span class="px-1">/</span>
                                    <span><?= $Bpost['publish'];?></span>
                                </div>
                                <a class="h6 m-0" href=""><?= $Bpost['judul'];?></a>
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