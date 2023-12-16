<?php 

	if (!isset($_SESSION['user'])) 
	{
		$_SESSION['no-login-message'] = " <div class='error'>Peringatan!<br>Harus Masuk Melalui Form Login...</div>";
		//mengarahkan ke file yang tertera
			header("location:".SITEURL.'/admin/login.php');
	}
 ?>