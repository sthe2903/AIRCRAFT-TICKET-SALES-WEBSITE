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
		$idpgw=$_POST['no_pegawai'];
		$nmpgw=$_POST['nama_pegawai'];
		$alamat=$_POST['alamat_pegawai'];
		$jkelamin=$_POST['jenis_kelamin'];
		$umurpgw=$_POST['umur_pegawai'];
		$telepon=$_POST['telepon'];
		$tlahir=$_POST['tmp_lahir'];
		$tgllahir=$_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];


		if($_FILES["foto"]["name"]!=''){
			$loc=$_FILES['foto']['tmp_name'];
			$des="foto/".$_FILES['foto']['name'];
			if( move_uploaded_file($loc, $des))
				{$pesan='.Foto asli berhasil di upload';}
			else
				{$pesan='.Foto asli gagal di upload';}	
		}
$update = mysqli_query ($conn,"UPDATE  tbl_pegawai SET nama_pegawai='$nmpgw',alamat_pegawai='$alamat',jenis_kelamin='$jkelamin',umur_pegawai='$umurpgw',telepon='$telepon',tmp_lahir='$tlahir',tgl_lahir='$tgllahir',foto='".$_FILES["foto"]["name"]."' where no_pegawai='$idpgw' ") or die (mysqli_error());

//jika query update sukses
		if($update){

  echo '<br/><br/>Data berhasil di Update! ';
  echo '<a href="entry_pegawai.php" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}else{

  echo 'Gagal menyimpan data!)';  //Pesan jika proses simpan gagal
  echo '<a href="editpegawai.php?idp='.$id.'" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}


?>

</div>
</div>


<?php include('template/footer.php'); ?>

