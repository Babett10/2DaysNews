<?php
// Kelompok 2 - 2DAYNEWS
// Final Project

require '../functions.php';

$id = $_GET['id'];
$posts = query("SELECT posts.id, img, judul, body, publish, category_id, category.nama_category, author_id, author.nama_author
FROM posts 
JOIN category ON posts.category_id = category.id
JOIN author ON posts.author_id = author.id
WHERE posts.id = $id")[0];

$category = query("SELECT category.id, nama_category FROM category JOIN posts ON posts.category_id = category.id GROUP BY nama_category");
$author = query("SELECT author.id, nama_author FROM author JOIN posts ON posts.author_id = author.id GROUP BY nama_author");


if (isset($_POST['update_posts'])) {
    if (update_posts($_POST) > 0) {
        echo "<script>
            alert('Data Successfully update!');
            document.location.href = '../../dashboard/posts.php';
          </script>";
    } else {
        echo "<script>
            alert('Data Failed to update!');
            document.location.href = '../../dashboard/posts.php';
          </script>";
    }
}

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: ../../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Css Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="shortcut icon" href="../../img/2daynews.png">
    <title>2DAYNEWS | Update Data Posts</title>

    <style>
        .container {
            width: 800px;
            margin: 20px;
        }
    </style>
</head>

<body class="bg-info ">
    <div class="form d-flex justify-content-center align-item-center">
        <div class=" container">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $posts["id"] ?>">
                <div class="card-panel">
                    <h5>Form Update Data Posts</h5>
                    <div class="input-field">
                        <input type="text" name="judul" id="judul" required value="<?= $posts["judul"]; ?>">
                        <label for="judul">Title</label>
                    </div>
                    <div class="input-field">
                        <textarea name="body" id="body" rows="20" style="height: 7rem;" required class="materialize-textarea"><?= $posts["body"]; ?></textarea>
                        <label for="body">Body</label>
                    </div>
                    <div class="input-field">
                        <input type="date" name="publish" id="publish" required value="<?= $posts["publish"]; ?>">
                        <label for="publish">Publish</label>
                    </div>
                    <div class="input-field">
                        <select class="browser-default" name="category_id">
                            <option value="<?= $posts['category_id']; ?>" selected><?php echo $posts['nama_category']; ?></option>
                            <?php foreach ($category as $categories) : ?>
                                <?php if ($posts['category_id'] != $categories['id']) : ?>
                                    <option value="<?= $categories['id']; ?>"><?= $categories['nama_category']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-field">
                        <select class="browser-default" name="author_id">
                            <option value="<?= $posts['author_id']; ?>" selected><?php echo $posts['nama_author']; ?></option>
                            <?php foreach ($author as $auth) : ?>
                                <?php if ($posts['author_id'] != $auth['id']) : ?>
                                    <option value="<?= $auth['id']; ?>"><?= $auth['nama_author']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="file-field input-field">
                        <input type="hidden" name="gambar_lama" value="<?= $posts['img']; ?>">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" multiple name="gambar" class="gambar" onchange="previewImage()">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload Image">
                        </div>
                        <img src="../../img/<?= $posts["img"]; ?>" width="120px" style="display: block;" class="img-preview">
                    </div>
                    <button class="waves-effect waves-light green darken-4 btn" type="submit" name="update_posts">Update Data!</button>
                    <button class="waves-effect waves-light blue darken-4 btn" type="submit">
                        <a href="../../dashboard/posts.php" style='text-decoration: none; color: white;'>Back</a>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JS Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        function previewImage() {
            const gambar = document.querySelector('.gambar');
            const imgPreview = document.querySelector('.img-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(gambar.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };
        };
    </script>
</body>

</html>