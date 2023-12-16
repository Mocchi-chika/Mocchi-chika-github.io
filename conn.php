<?php 
//start session
session_start();

 // buat koneksi dengan database mysql
define('SITEURL', 'http://localhost/kelompok_3/modul');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_modul');

 
 //koneksi data ke database
  $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error()); //koneksi
  $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //seleksi


  

 ?>

 