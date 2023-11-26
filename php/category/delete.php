<?php
// Kelompok 2 - 2DAYNEWS
// Final Project

require '../functions.php';
$id = $_GET['id'];

if (delete_category($id) > 0) {
  echo "<script>
          alert('Data Successfully deleted!');
          document.location.href = '../../dashboard/category.php';
        </script>";
} else {
  echo "<script>
          alert('Data Failed to delete!');
          document.location.href = '../../dashboard/category.php';
        </script>";
}
