<!-- header -->
<?php include('pecahan/menu.php'); ?>

		<!-- Menu Utama Start -->
		<section class="navbar">
		<div class="menu text-center">
			<div class="container">
				<h1>Management Pengguna</h1>
				<br>
				<br><br>
<?php 
if (isset($_SESSION['add'])) 
{
	echo $_SESSION['add'];
	unset($_SESSION['add']);
	# code...
}

if (isset($_SESSION['delete'])) 
{
	echo $_SESSION['delete'];
	unset($_SESSION['delete']);
}

if (isset($_SESSION['update'])) 
{
	echo $_SESSION['update']; 
	unset($_SESSION['update']);
}

if (isset($_SESSION['user-not-found'])) 
{
	echo $_SESSION['user-not-found']; 
	unset($_SESSION['user-not-found']);
}

if (isset($_SESSION['psw-not-same'])) 
{
	echo $_SESSION['psw-not-same']; 
	unset($_SESSION['psw-not-same']);
}

if (isset($_SESSION['change-psw'])) 
{
	echo $_SESSION['change-psw']; 
	unset($_SESSION['change-psw']);
}

?>
<br><br>

				<!-- button tabel admin -->
				<a href="add_admin.php" class="btn-primary">Add User</a>
<br><br><br>
				<table class="tbl-full">
					<tr>
						<th>No</th>
						<th>Full Name</th>
						<th>Username</th>
						<th>Action</th>
					</tr>

<?php 
//koneksi data ke database
	$conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //koneksi
	$db_select = mysqli_select_db($conn, 'db_modul')or die(mysqli_error()); //seleksi

$sql = "SELECT *FROM tbl_admin";
$res = mysqli_query($conn, $sql);


	//3. eksekusi query & menyimpan data ke database
	$res = mysqli_query($conn, $sql) or die(mysqli_error());
//pengecekan isi tabel
if ($res==TRUE) 
{

	$count = mysqli_num_rows($res); //function ini untuk mengambil data dalam database

	$no=1;
	if($count>0)
	{    
		//terdapat data dalam databases
		while ($rows=mysqli_fetch_assoc($res)) 
		{
			//menggunakan looping untuk memanggil semua data dari database

			//mengambil data satu-satu
			$id=$rows['id'];
			$full_name=$rows['full_name'];
			$username=$rows['username'];

			?>
				<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $full_name; ?></td>
						<td><?php echo $username; ?></td>
						<td>
							<a href="<?php echo SITEURL; ?> /admin/update_password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
							<a href="<?php echo SITEURL; ?> /admin/update_admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update User</a>
							<a href="<?php echo SITEURL; ?> /admin/delete_admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete User</a>
						</td>
				</tr>
			<?php


		}
	}
	else
	{
		//tidak terdapat data dalam databases
	}
}

 ?>


					
				</table>

			</div>
		</div>
	</section>
		<!-- Menu Utama End -->

		<!-- Menu 2 Start -->
		<?php include('pecahan/menu2.php'); ?>
		<!-- Menu 2 End -->

		<!-- footer -->
<?php include('pecahan/footer.php'); ?>