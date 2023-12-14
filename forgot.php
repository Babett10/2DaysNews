<?php
// Kelompok 2 - 2DAYNEWS
// Final Project

require 'php/functions.php';
$random = rand(9999,1000);

if (isset($_POST["forgot"])) {
    $captcha = $_REQUEST['chaptcha'];
    $randChaptcha = $_REQUEST['randChaptcha'];
    if ($captcha != $randChaptcha) {
        $errorChaptcha = true;
    }
    else {

        if (forgot($_POST) > 0) {
            echo "<script>
                    alert('Reset Password Successful');
                    document.location.href = 'login.php';
                </script>";
        } else {
            echo "<script>
                    alert('Reset Password Failed');
                </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>2DAYNEWS | Reset Password</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Bootstrap App Landing Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Small Apps Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/2daynews.png">

    <!-- PLUGINS CSS STYLE -->
    <link rel="stylesheet" href="login/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="login/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="login/plugins/slick/slick.css">
    <link rel="stylesheet" href="login/plugins/slick/slick-theme.css">
    <link rel="stylesheet" href="login/plugins/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="login/plugins/aos/aos.css">

    <!-- CUSTOM CSS -->
    <link href="login/css/style.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8e8e8;
            background-image: url(login/bg1.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .blur {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(5px);
        }

        .btn a:hover {
            color: white;
        }
    </style>
</head>

<body class="body-wrapper blur" data-spy="scroll" data-target=".privacy-nav">

    <section class="user-login">
        <div class="container p-5 ">
            <div class="row " style="justify-content: center;">
                <div class="col-5">
                    <div class="block bg-white" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
                        <!-- Content -->
                        <div class="content text-center">
                            <img src="login/logo.jpg" width="230px" alt="">
                            <div class="title-text">
                                <h3><b>Forgot Password?</b></h3>
                            </div>
                            <form action="" method="post">
                                <?php if (isset($errorChaptcha)) : ?>
                                    <p style="color: red; font-style: italic;">Chaptcha Salah</p>
                                <?php endif; ?>
                                <!-- Username -->
                                <input class="form-control main" type="text" id="username" name="username" placeholder="Username" required>
                                <!-- Password -->
                                <input class="form-control main" type="password" id="password" name="password" placeholder="New Password" required>
                                <!-- Konfirmasi Password -->
                                <input class="form-control main" type="password" id="password" name="password" placeholder="Confirm New Password" required>
                                 <!-- Chaptcha -->
                                 <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Chaptcha" id="chaptcha" name="chaptcha" maxlength="4" required>
                                <span class="input-group-text"><?php echo $random ?></span>
                                <input type="hidden" id="randChaptcha" name="randChaptcha" value="<?php echo $random ?>">
                                </div>
                                <!-- Submit Button -->
                                <button class="btn btn-main-sm" type="submit" name="forgot">Reset Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JAVASCRIPTS -->
    <script src="login/plugins/jquery/jquery.min.js"></script>
    <script src="login/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="login/plugins/slick/slick.min.js"></script>
    <script src="login/plugins/fancybox/jquery.fancybox.min.js"></script>
    <script src="login/plugins/syotimer/jquery.syotimer.min.js"></script>
    <script src="login/plugins/aos/aos.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
    <script src="login/plugins/google-map/gmap.js"></script>

    <script src="login/js/script.js"></script>
</body>

</html>