<?php 
include('template/top.php');
include('template/navigasi.php');
 if(!isset($_SESSION)){
 	session_start();
 }
 if (empty($_SESSION['username'])) {
 	header('Location:login.php');
 }
?>
<div id="main">
	<div class="content">
		<?php
		include('koneksi/conn.php');
		$notjn=$_POST['no_tujuan'];
		$ktujuan=$_POST['kota_tujuan'];
		$notiket=$_POST['no_tiket'];
		$update = mysqli_query ($conn,"UPDATE  tbl_tujuan SET kota_tujuan='$ktujuan',no_tiket='$notiket' where no_tujuan='$notjn' ") or die (mysqli_error());

//jika query update sukses
		if($update){

  echo '<br/><br/>Data berhasil di Update! ';  //Pesan jika proses simpan sukses
  echo '<a href="entry_tujuan.php" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}else{

  echo 'Gagal menyimpan data! ';  //Pesan jika proses simpan gagal
  echo '<a href="edittujuan.php?id_tujuan='.$id.'" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}


?>

</div>
</div>


<?php include('template/footer.php'); ?>

