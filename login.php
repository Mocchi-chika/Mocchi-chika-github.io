<?php 
include('../config/conn.php'); 
?>

<!DOCTYPE html>
<html>
	<head>
			<title>Login - Management Modul System</title>
			<link rel="stylesheet" href="../css/admin.css">
	</head>

		<body>

			<div class="login">
				<fieldset>
				<legend>Created By - <a href="www.AriaRifaldy.com">Aria Rifaldy</a></legend>
					<h1 class="text-center"><u>Login Admin</u></h1>
					<br><br>

<?php 

if (isset($_SESSION['login'])) 
{
	echo $_SESSION['login'];
	unset($_SESSION['login']);
} 

if (isset($_SESSION['no-login-message'])) 
{
	echo $_SESSION['no-login-message'];
	unset($_SESSION['no-login-message']);
}

?>
<br>
				<!-- FORM LOGIN START-->
				<form action="" method="POST">
					<table class="tbl-30">
						<tr>
							<td>Username</td>
							<td>:</td>
							<td><input type="text" name="username" placeholder="Masukan Username anda..."></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td><input type="password" name="password" placeholder="Masukan Password anda..."></td>
						</tr>
						<tr>
							<td colspan="2">
								
								<p align="center"><input type="submit" name="submit" value="Masuk" class="btn-primary"></p>
							</td>
						</tr>

						
					</table>
				</form>
				<!-- FORM LOGIN END-->

				
				</fieldset>
			</div>

		</body>
</html>


<?php 
if (isset($_POST['submit'])) 
{
	
	//$username = $_POST['username'];
	//$password = md5($_POST['password']);
	//mysqli_real_escape_string() untuk Membaca Karakter input *@,dll

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$raw_password = md5($_POST['password']);
	$password = mysqli_real_escape_string($conn, $raw_password);

	//2. sql query untuk mencocokan data ke database
	$sql = "SELECT * FROM  tbl_admin WHERE username='$username' AND password='$password'";

	//3. eksekusi query & menyimpan data ke database
	$res = mysqli_query($conn, $sql);

	$count = mysqli_num_rows($res); //function ini untuk mengambil data dalam database


	//4. pengecekan
		if($count==1)
		{
			//pesan success 
			$_SESSION['login'] = "<div class='success'>Berhasil Masuk...</div>";
			$_SESSION['user'] = $username;  //untuk mengecek pengguna telah masuk atau tidak
			//mengarahkan ke file yang tertera
			header("location:".SITEURL.'/admin/index.php');
		}
		else
		{
			//pesan success 
			$_SESSION['login'] = "<div class='error text-center'>Username atau password anda tidak sesuai...</div>";
			//mengarahkan ke file yang tertera
			header("location:".SITEURL.'/admin/login.php');
		}

}

 ?>