<!-- header -->
<?php include('pecahan/menu.php'); ?>

		<!-- Menu Utama Start -->
		<section class="navbar">
		<div class="menu text-center">
			<div class="container">
				<h1>DASHBOARD</h1>

				<div class="col-4 text-center">
				<?php 
					//sql query
					$sql2 = "SELECT * FROM tbl_admin";
					//mengeksekusi query
					$res2 = mysqli_query($conn, $sql2);
					//menghitung baris tabel
					$count2 = mysqli_num_rows($res2);
					?>
					<h1><?php echo $count2; ?></h1>
					<br>
					Data User
				</div>	
				<div class="col-4 text-center">
				<?php 
					//sql query
					$sql3 = "SELECT * FROM tbl_modul";
					//mengeksekusi query
					$res3 = mysqli_query($conn, $sql3);
					//menghitung baris tabel
					$count3 = mysqli_num_rows($res3);
					?>
					<h1><?php echo $count3; ?></h1>
					<br>
					Data Modul
				</div>		
		
				<div class="clearfix"></div>

			</div>
		</div>
	</section>
		<!-- Menu Utama End -->

		<!-- Menu 2 Start -->
		<?php include('pecahan/menu2.php'); ?>
		<!-- Menu 2 End -->
<!-- footer -->
<?php include('pecahan/footer.php'); ?>