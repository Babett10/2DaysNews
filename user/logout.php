<?php
// Kelompok 2 - 2DAYNEWS
// Final Project

session_start();
session_destroy();

setcookie('username', '', time() - 3600);
setcookie('hash', '', time() - 3600);
header("Location: ../index.php");
die;