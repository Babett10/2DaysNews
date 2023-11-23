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
                    <a href="index.php" class="nav-item nav-link ">Home</a>
                    <a href="category.php" class="nav-item nav-link">Categories</a>
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