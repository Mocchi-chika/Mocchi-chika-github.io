<!-- header -->
<?php include('pecahan/menu.php'); ?>

		<!-- Menu Utama Start -->
		<section class="navbar">
		<div class="menu text-center">
			<div class="container">
				<h1>Management Modul</h1>

<br><br><br>
<!--pesan-->

<?php
	if (isset($_SESSION['add'])) 
	{
		echo $_SESSION['add'];
		unset($_SESSION['add']);
	}

	if (isset($_SESSION['upload'])) 
	{
		echo $_SESSION['upload'];
		unset($_SESSION['upload']);
	}

	if (isset($_SESSION['delete'])) 
	{
		echo $_SESSION['delete'];
		unset($_SESSION['delete']);
	}

	if (isset($_SESSION['remove'])) 
	{
		echo $_SESSION['remove'];
		unset($_SESSION['remove']);
	}
	if (isset($_SESSION['unauthorized'])) 
	{
		echo $_SESSION['unauthorized'];
		unset($_SESSION['unauthorized']);
	}

	if (isset($_SESSION['no-food-found'])) 
	{
		echo $_SESSION['no-food-found'];
		unset($_SESSION['no-food-found']);
	}

	if (isset($_SESSION['update'])) 
	{
		echo $_SESSION['update'];
		unset($_SESSION['update']);
	}
 ?>
<br>

				<!-- button tabel Tambah data -->
				<a href="<?php echo SITEURL; ?>/admin/add_modul.php" class="btn-primary">Add Modul</a>
<br>
<br>
				<table class="tbl-full">
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Nama Pengarang</th>
						<th>Gambar</th>
						<th>Fitur</th>
						<th>Aktif</th>
					</tr>

					<?php 

						//query to get all categories from database
						$sql = "SELECT * FROM tbl_modul";

						$res = mysqli_query($conn, $sql);

						$count = mysqli_num_rows($res);

						//membuat penomoran
						$no=1;

						//cek
						if($count>0)
						{
							//we have data in database
							//mengambil data dan tampilkan
							while ($row = mysqli_fetch_assoc($res)) 
							{
								$id 		=$row['id'];
								$title		=$row['title'];
								$pengarang 	=$row['pengarang'];
								$image_name =$row['image_name'];
								$featured 	=$row['featured'];
								$active 	=$row['active'];

							  ?>
								  <tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $title; ?></td>
										<td><?php echo $pengarang; ?></td>

										<td>

											<?php 
										//cek
										if ($image_name!="") 
										{
											?>

											<!--menampilkan gambar jika ada-->
											<img src="<?php echo SITEURL; ?>../images/modul/<?php echo $image_name; ?>" width="100px">

											<?php
										}
										else
											{
												//menampilkan pesan jika tidak ada
												echo "<div class='error'> Gambar Tidak Ditambahkan</div>";
											}
								?>

										</td>

										<td><?php echo $featured; ?></td>
										<td><?php echo $active; ?></td>
										<!--action button edit dan hapus-->

									</tr>

							  	<?php
							}
						}
						else
							{
								//we dont have data in database
								?>

									<tr>
										<td colspan="6"><div class="error">Tidak ada modul yang ditambahkan.</div></td>
									</tr>


								<?php
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