 <?php 
//include file
 include('../config/conn.php'); 

//mengambil data id dari tabel admin
 $id = $_GET['id'];

 //2. membuat perintah sql query umtuk menghapus data
 $sql = "DELETE FROM tbl_admin WHERE id=$id";

 $res = mysqli_query($conn, $sql);

 //pengecekan isi tabel
if ($res==TRUE) 
{
	//echo "Admin Deleted";
	$_SESSION['delete'] = "<div class='success'>Menghapus Data Berhasil</div>";
	header("location:".SITEURL.'/admin/manage_admin.php');
}
else
{
	//echo "failed to deleted";
	$_SESSION['delete'] = "<div class='error'>Menghapus Data Gagal. Silahkan Coba Lagi...</div>";
	header("location:".SITEURL.'/admin/manage_admin.php');
}



 ?>