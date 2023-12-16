<!--header-->
<?php include('pecahan/menu.php');?>


 <div class="main-content">
	<div class="wrapper">
		<fieldset>
		<legend> Tambah Modul </legend>
		<br><br>

<!--pesan start-->
<?php
	if (isset($_SESSION['add'])) 
	{
		echo $_SESSION['add'];
		unset($_SESSION['add']);
	}
 ?>

 <?php
	if (isset($_SESSION['upload'])) 
	{
		echo $_SESSION['upload'];
		unset($_SESSION['upload']);
	}
 ?>
<!--pesan end-->

<br><br>
				<!--Form Start-->
				<form action="" method="POST" enctype="multipart/form-data">

					<table class="tbl-30">
						<tr>
							<td>Judul</td>
							<td> : </td>
							<td><input type="text" name="title" placeholder="Masukan Judul Modul..."> </td>
						</tr>

						<tr>
							<td>Deskripsi </td>
							<td> : </td>
							<td>
								<textarea name="description" placeholder="Masukan Deskripsi..."></textarea>								
							</td>
						</tr>

						<tr>
							<td> Pengarang </td>
							<td> : </td>
							<td><input type="text" name="pengarang" placeholder="Masukan Nama Pengarang"> </td>
						</tr>

						<tr>
							<td>Pilih Gambar</td>
							<td> : </td>
							<td><input type="file" name="image"></td>	
						</tr>

						<tr>
							<td>Pilih File</td>
							<td> : </td>
							<td><input type="file" name="berkas"></td>	
						</tr>


						<tr>
							<td>Fitur </td>
							<td> : </td>
							<td>
								<input type="radio" name="featured" value="Yes">Yes 
								<input type="radio" name="featured" value="No">No
							</td>
						</tr>

						<tr>
							<td>Aktif </td>
							<td> : </td>
							<td>
								<input type="radio" name="active" value="Yes">Yes 
								<input type="radio" name="active" value="No">No
							</td>
						</tr>

							<tr>
								<td colspan="2">
									<input type="submit" name="submit" value="Tambah Makanan" class="btn-secondary"> 
								</td>
							</tr>

					</table>
					
				</form>
				<!--Form End-->

							<?php 

								if(isset($_POST['submit']))
								{
									//BUTTON CLICKED
									//echo "Button Clicked";

									//1. mengambil data dari database tabel
									$title 		 = $_POST['title'];
									$description = $_POST['description'];
									$pengarang 		 = $_POST['pengarang'];
									
									if(isset($_POST['featured'])) 
									{
										$featured = $_POST['featured'];
									}
									else
										{
											$featured = "No";
										}

									if(isset($_POST['active'])) 
									{
										$active = $_POST['active'];
									}
									else
										{
											$active = "No";  //value
										}

									//cek gambar yang dipilih
									//print_r($_FILES['image']);

									//die(); //break the code
									if (isset($_FILES['image']['name'])) 
									{
										//upload the image
										$image_name = $_FILES['image']['name'];

										//masukan gambar saja
										if ($image_name != "") 
										{
											

											//otomatis mengubah nama gambar
											//get the extension of our image(jpg, png, gif, dll). "special food1.jpg"
											$ext = end(explode('.', $image_name));

											//rename image
											$image_name = "Modul_Name_".rand(000, 999).'.'.$ext; //contoh: food_000.jpg


											$src = $_FILES['image']['tmp_name'];

											$dst ="../images/modul/".$image_name;

											//FInally Upload the image
											$upload = move_uploaded_file($src, $dst);

											//cek gambar apakah sudah ter-Upload atau belum
											if ($upload==false) 
												{
													//pesan
													$_SESSION['upload'] = "<div class='error text-center'>Data Gagal Ditambahkan</div>";
													header("location:".SITEURL.'/admin/add_modul.php'); 

													//stop proses
													die();
												}

										}
									}
									else
									{
										//gagal
										$image_name= "";
									}




									if (isset($_FILES['berkas']['name'])) 
									{
										//upload the image
										$namaFile = $_FILES['berkas']['name'];

										//masukan gambar saja
										if ($namaFile != "") 
										{
											

											//otomatis mengubah nama gambar
											//get the extension of our image(jpg, png, gif, dll). "special food1.jpg"
											$ext2 = end(explode('.', $namaFile));


											$src2 = $_FILES['berkas']['tmp_name'];

											$dst2 ="../berkas/".$namaFile;

											//FInally Upload the image
											$upload2 = move_uploaded_file($src2, $dst2);

											//cek gambar apakah sudah ter-Upload atau belum
											if ($upload2==false) 
												{
													//pesan
													$_SESSION['upload'] = "<div class='error text-center'>Data Gagal Ditambahkan</div>";
													header("location:".SITEURL.'/admin/add_modul.php'); 

													//stop proses
													die();
												}

										}
									}
									else
									{
										//gagal
										$namaFile= "";
									}

										//2. sql query untuk menyimpan data ke database
										$sql2 = "INSERT INTO tbl_modul SET
											title 		= '$title',
											description = '$description',
											pengarang 	= '$pengarang',
											image_name  = '$image_name',
											namaFile 	= '$namaFile',
											featured  	= '$featured',
											active  	= '$active'
										";

										//3. eksekusi query & menyimpan data ke database
										$res2 = mysqli_query($conn, $sql2)or die(mysqli_error());
									 
										//4. pengecekan
										if($res2==true)
											{
												//data berhasil masuk
												//echo "Data berhasil disimpan";
												$_SESSION['add'] = "<div class='success text-center'>Data Berhasil Ditambahkan</div>";
												header("location:".SITEURL.'/admin/manage_modul.php');
											}
											else
											{
												//gagal memasukan data
												//echo "gagal";
												$_SESSION['add'] = "<div class='error text-center'>Data Gagal Ditambahkan</div>";
												header("location:".SITEURL.'/admin/add_modul.php');
											}
								}  

							?>

		</fieldset>
	</div>
</div>


 <?php include('pecahan/menu2.php'); ?>
 <?php include('pecahan/footer.php'); ?>