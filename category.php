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
    <?php include 'header.php'; ?>
    <!-- Topbar End -->
    <div class="container-fluid py-3 px-lg-5">
    <div class="row">
            <div class="col-lg-6 py-3">
                <div class="bg-dark py-2 px-4 mb-3">
                    <h3 class="m-0" style="color: white;">Politik</h3>
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
                <div class="bg-dark py-2 px-4 mb-3 mt-3">
                    <a href="#" style="color: white;">View All</a>
                </div>
            </div>
            <div class="col-lg-6 py-3">
                <div class="bg-dark py-2 px-4 mb-3">
                    <h3 class="m-0" style="color: white;">Sport</h3>
                </div>
                <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/news-500x280-4.jpg" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="">Technology</a>
                                <span class="px-1">/</span>
                                <span>January 01, 2045</span>
                            </div>
                            <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                        </div>
                    </div>
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/news-500x280-5.jpg" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 13px;">
                                <a href="">Technology</a>
                                <span class="px-1">/</span>
                                <span>January 01, 2045</span>
                            </div>
                            <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                        </div>
                    </div>
                    <div class="position-relative">
                        <img class="img-fluid w-100" src="img/news-500x280-6.jpg" style="object-fit: cover;">
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
                <div class="bg-dark py-2 px-4 mb-3 mt-3">
                    <a href="#" style="color: white;">View All</a>
                </div>
            </div>
        </div>
    </div>




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