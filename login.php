<?php
// Kelompok 2 - 2DAYNEWS
// Final Project
session_start();
require 'php/functions.php';

if (isset($_SESSION['username'])) {
  header("Location: dashboard/admin.php");
  exit;
}

$random = rand(9999,1000);

// Admin
if (isset($_POST['submit'])) {
  $captcha = $_REQUEST['chaptcha'];
  $randChaptcha = $_REQUEST['randChaptcha'];
  if ($captcha != $randChaptcha) {
    $errorChaptcha = true;
  }
  else {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username' AND roles = 'admin'");
  
    if (mysqli_num_rows($cek_user) > 0) {
      $row = mysqli_fetch_assoc($cek_user);
      if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['hash'] = hash('sha256', $row['id_user'], false);

        if (isset($_POST['remember'])) {
          setcookie('username', $row['username'], time() + 60 * 60 * 24);
          $hash = hash('sha256', $row['id_user']);
          setcookie('hash', $hash, time() + 60 * 60 * 24);
        }

        if (hash('sha256', $row['id_user']) == $_SESSION['hash']) {
          header("Location: dashboard/admin.php");
          die;
        }
        header("Location: user/index.php");
        die;
      }
    }
    $errorLogin = true;
  }
}

// User
if (isset($_POST['submit'])) {
  $captcha = $_REQUEST['chaptcha'];
  $randChaptcha = $_REQUEST['randChaptcha'];
  if ($captcha != $randChaptcha) {
    $errorChaptcha = true;
  }
  else {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username' AND roles = 'user'");

    if (mysqli_num_rows($cek_user) > 0) {
      $row = mysqli_fetch_assoc($cek_user);
      if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['hash'] = hash('sha256', $row['id_user'], false);

        if (isset($_POST['remember'])) {
          setcookie('username', $row['username'], time() + 60 * 60 * 24);
          $hash = hash('sha256', $row['id_user']);
          setcookie('hash', $hash, time() + 60 * 60 * 24);
        }

        if (hash('sha256', $row['id_user']) == $_SESSION['hash']) {
          header("Location: user/index.php");
          die;
        }
        header("Location: user/index.php");
        die;
      }
    }
    $errorLogin = true;
  }
}

if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
  $username = $_COOKIE['username'];
  $hash = $_COOKIE['hash'];

  $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  $row = mysqli_fetch_assoc($result);

  if ($hash === hash('sha256', $row['id_user'], false)) {
    $_SESSION['username'] = $row['username'];
    header("Location: dashboard/admin.php");
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>2DAYNEWS | Login</title>

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
    <div class="container p-5">
      <div class="row" style="justify-content: center;">
        <div class="col-5">
          <div class="block box bg-white" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
            <!-- Content -->
            <div class="content text-center">
              <img src="login/logo.jpg" width="230px" alt="">
              <div class="title-text">
                <h3><b>Sign In </b></h3>
              </div>
              <form action="" method="post">
                <?php if (isset($errorLogin)) : ?>
                  <p style="color: red; font-style: italic;">Username atau Password salah</p>
                <?php endif; ?>
                <?php if (isset($errorChaptcha)) : ?>
                  <p style="color: red; font-style: italic;">Chaptcha salah</p>
                <?php endif; ?>
                <!-- Username -->
                <input class="form-control main box" type="text" id="username" name="username" placeholder="Username" required>
                <!-- Password -->
                <input class="form-control main box" type="password" id="password" name="password" placeholder="Password" required>
                <!-- Chaptcha -->
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Chaptcha" id="chaptcha" name="chaptcha" maxlength="4" required>
                  <span class="input-group-text"><?php echo $random ?></span>
                  <input type="hidden" id="randChaptcha" name="randChaptcha" value="<?php echo $random ?>">
                </div>
                <!-- Submit Button -->
                <button class="btn btn-main-sm box" type="submit" name="submit">Sign In</button>
              </form>
              <div class="new-acount">
                <a href="forgot.php">Forgot your password?</a>
                <p>Don't Have an account? <a href="signup.php" class="text-primary"> SIGN UP</a></p>
              </div>
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