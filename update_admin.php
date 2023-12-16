<!-- header -->
<?php 
include('pecahan/menu.php');




$id = $_GET['id'];
$sql = "SELECT *FROM tbl_admin WHERE id='$id'";
$res = mysqli_query($conn, $sql);


	//3. eksekusi query & menyimpan data ke database
	$res = mysqli_query($conn, $sql) or die(mysqli_error());
//pengecekan isi tabel
if ($res==TRUE) 
{
	$count = mysqli_num_rows($res); //function ini untuk mengambil data dalam database

	if($count==1)
	{
		$row = mysqli_fetch_assoc($res);

		$full_name = $row['full_name'];
		$username = $row['username'];

	}
	else
	{
		//echo "failed to deleted";
	
	}
}
 ?>

		<!-- Menu Utama Start -->
		<section class="navbar">
		<div class="menu text-center">
			<div class="container">
		

	<form action="" method="POST">
		<fieldset>
		<legend>Edit Data Admin</legend>
		<br><br>



<br><br>
		<table class="tbl-30">
			<tr>
				<td>No </td>
				<td> : </td>
				<td><input type="text" name="id" value="<?php echo $id; ?>" readonly> </td>
			</tr>
			<tr>
				<td>Full Name </td>
				<td> : </td>
				<td><input type="text" name="full_name" value="<?php echo $full_name; ?>"> </td>
			</tr>
			<tr>
				<td>Username </td>
				<td> : </td>
				<td><input type="text" name="username" value="<?php echo $username; ?>"> </td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="submit" name="submit" value="Update Data" class="btn-secondary">
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
if(isset($_POST['submit'])){
	//BUTTON CLICKED
	//echo "Button Clicked";

	//1. mengambil data dari database tabel
	$id = $_POST['id'];
	$full_name = $_POST['full_name'];
	$username  = $_POST['username'];

	//2. sql query untuk menyimpan data ke database
	$sql = "UPDATE tbl_admin SET
		full_name = '$full_name',
		username  = '$username'
		WHERE id='$id'
	";

	
	//3. eksekusi query & menyimpan data ke database
	$res = mysqli_query($conn, $sql) or die(mysqli_error());

	//4. pengecekan
	if($res==TRUE){
		//data berhasil masuk
		//echo "Data berhasil disimpan";
		$_SESSION['update'] = "<div class='success'>Data Berhasil Di Edit</div>";
		header("location:".SITEURL.'/admin/manage_admin.php');
	}else{
		//gagal memasukan data
		//echo "gagal";
		$_SESSION['update'] = "<div class='error'>User Gagal Di Edit</div>";
		header("location:".SITEURL.'/admin/add_admin.php');
	}
}

 ?>

		<!-- Menu 2 Start -->
		<?php include('pecahan/menu2.php'); ?>
		<!-- Menu 2 End -->

		<!-- footer -->
		<?php include('pecahan/footer.php'); ?>
