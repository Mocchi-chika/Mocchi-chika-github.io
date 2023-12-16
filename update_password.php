<!-- header -->
<?php include('pecahan/menu.php'); ?>

		<!-- Menu Utama Start -->
		<section class="navbar">
		<div class="menu text-center">
			<div class="container">
		
<?php 
	if (isset($_GET['id'])) 
	{
		$id=$_GET['id'];
	}

 ?>


	<form action="" method="POST">
		<fieldset>
		<legend>Ubah Password</legend>
		<br><br>



<br><br>
		<table class="tbl-30">
			<tr>
				<td>Password Sebelumnya </td>
				<td> : </td>
				<td><input type="password" name="current_password" placeholder="Masukan Password Anda..." > </td>
			</tr>
			<tr>
				<td>Password Baru </td>
				<td> : </td>
				<td><input type="password" name="new_password" placeholder="Masukan Password Baru Anda..."> </td>
			</tr>
			<tr>
				<td>Konfirmasi Password </td>
				<td> : </td>
				<td><input type="password" name="confirm_password" placeholder="Konfirmasi Password Anda..."> </td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="submit" name="submit" value="Change Password" class="btn-secondary">
				</td>
			</tr>

		</table>
		</fieldset>
	</form>

			</div>
		</div>
	</section>
		<!-- Menu Utama End -->

<?php 
if(isset($_POST['submit']))
{
	//BUTTON CLICKED
	//echo "Button Clicked";

	//1. mengambil data dari database tabel
	$id=$_POST['id'];
	$current_password = md5($_POST['current_password']);
	$new_password  = md5($_POST['new_password']);
	$confirm_password  = md5($_POST['confirm_password']);

	//2. sql query untuk mencocokan data ke database
	$sql = "SELECT * FROM  tbl_admin WHERE id=$id AND password='$current_password'";

	//3. eksekusi query & menyimpan data ke database
	$res = mysqli_query($conn, $sql);

	//4. pengecekan
	if ($res==TRUE) 
	{
		$count = mysqli_num_rows($res); //function ini untuk mengambil data dalam database

		if($count==1)
		{

			if ($new_password==$confirm_password) 
			{
				$sql2 = "UPDATE tbl_admin SET
				password = '$new_password'
				WHERE id='$id'
				";

		$res2 = mysqli_query($conn, $sql2) or die(mysqli_error());

		if ($res2==TRUE) 
		{
			//pesan success 
			$_SESSION['change-psw'] = "<div class='success'>Password Berhasil Di Ubah...</div>";
			header("location:".SITEURL.'/admin/manage_admin.php');
		}
			else
				{
				//pesan error
				$_SESSION['change-psw'] = "<div class='error'>User tidak ditemukan</div>";
				header("location:".SITEURL.'/admin/manage_admin.php');
				}
			}  
				else
					{
						//jika psw tidak sama
						$_SESSION['psw-not-same'] = "<div class='error'>Password Tidak sesuai, periksa kembali...</div>";
						header("location:".SITEURL.'/admin/manage_admin.php');
					}
		}	
		else
			{
				//echo "gagal";
				$_SESSION['user-not-found'] = "<div class='error'>User tidak ditemukan</div>";
				header("location:".SITEURL.'/admin/manage_admin.php');
			}
	}
}

 ?>

		<!-- Menu 2 Start -->
		<?php include('pecahan/menu2.php'); ?>
		<!-- Menu 2 End -->

		<!-- footer -->
		<?php include('pecahan/footer.php'); ?>
