<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>2DayNews-Login</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Bootstrap App Landing Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Small Apps Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

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
    .blur{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      backdrop-filter: blur(5px);
    }
  </style>
</head>

<body class="body-wrapper blur" data-spy="scroll" data-target=".privacy-nav">

  <section class="user-login " style="padding-top: 70px;">
    <div class="container ">
      <div class="row" style="justify-content: center;">
        <div class="col-5">
          <div class="block box bg-white" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
            <!-- Content -->
            <div class="content text-center">
              <a href=""><img src="login/logo.jpg" width="230px" alt=""></a>
              <div class="title-text">
                <h3><b>Sign In </b></h3>
              </div>
              <form action="#">
                <!-- Username -->
                <input class="form-control main box" type="text" placeholder="Username" required>
                <!-- Password -->
                <input class="form-control main box" type="password" placeholder="Password" required>
                <!-- Submit Button -->
                <button class="btn btn-main-sm box"><a href="Dashboard/admin.php">Sign In</a></button>
              </form>
              <div class="new-acount">
                <a href="#">Forget your password?</a>
                <p>Don't Have an account? <a href="signup.php" class="text-primary"> SIGN UP</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- To Top -->
  <div class="scroll-top-to">
    <i class="ti-angle-up"></i>
  </div>

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