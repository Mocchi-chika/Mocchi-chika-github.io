<?php 

	include ('../config/conn.php'); 
	//menghapus sesi masuk
	session_destroy();  //tertuju kepada $_SESSION['user']

	//kembali ke form login
	header('location:'.SITEURL.'/../index.php')

 ?>