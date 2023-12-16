
<!-- header -->
<?php include('pecahan/menu.php'); ?>

		<!-- Menu Utama Start -->
		<section class="navbar">
		<div class="menu text-center">
			<div class="container">
		

	<form action="" method="POST">
		<fieldset>
		<legend>Tambah Data Admin</legend>
		<br>	
<?php 
if (isset($_SESSION['add'])) 
{
	echo $_SESSION['add'];
	unset($_SESSION['add']);
	# code...
}

?>
<br><br>
		<table class="tbl-30">
			<tr>
				<td>Nama Lengkap </td>
				<td> : </td>
				<td><input type="text" name="full_name" placeholder="Masukan Nama Lengkap..."> </td>
			</tr>
			<tr>
				<td>Username </td>
				<td> : </td>
				<td><input type="text" name="username" placeholder="Masukan Username Anda..."> </td>
			</tr>
			<tr>
				<td>Password </td>
				<td> : </td>
				<td><input type="text" name="password" placeholder="Masukan Password Anda..."> </td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Add Admin" class="btn-secondary"> </td>
			</tr>

		</table>
		</fieldset>
	</form>

			</div>
		</div>
	</section>
		<!-- Menu Utama End -->

		<!-- Menu 2 Start -->
		<?php include('pecahan/menu2.php'); ?>
		<!-- Menu 2 End -->

		<!-- footer -->
		<?php include('pecahan/footer.php'); ?>


<?php 

if(isset($_POST['submit']))
{
	//BUTTON CLICKED
	//echo "Button Clicked";

	//1. mengambil data dari database tabel
	$full_name = $_POST['full_name'];
	$username  = $_POST['username'];
	$password  = md5($_POST['password']); //enkripsi password dengan md5

	//2. sql query untuk menyimpan data ke database
	$sql = "INSERT INTO tbl_admin SET
		full_name = '$full_name',
		username  = '$username',
		password  = '$password'
	";

	
	//3. eksekusi query & menyimpan data ke database
	$res = mysqli_query($conn, $sql) or die(mysqli_error());

	//4. pengecekan
	if($res==TRUE){
		//data berhasil masuk
		//echo "Data berhasil disimpan";
		$_SESSION['add'] = "<div class='success'>Data Berhasil Ditambahkan</div>";
		header("location:".SITEURL.'/admin/manage_admin.php');
	}else{
		//gagal memasukan data
		//echo "gagal";
		$_SESSION['add'] = "<div class='error'>User Gagal Ditambahkan</div>";
		header("location:".SITEURL.'/admin/add_admin.php');
	}
}

 ?>