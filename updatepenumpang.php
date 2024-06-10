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
		$idpnp=$_POST['no_identitas'];
		$nmpnp=$_POST['nama_konsumen'];
		$alamat=$_POST['almt_konsumen'];
		$nohp=$_POST['telepon'];
		$umurpnp=$_POST['umur'];
		$jekelamin=$_POST['jenis_kelamin'];
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
		$update = mysqli_query ($conn,"UPDATE  tbl_konsumen SET nama_konsumen='$nmpnp',almt_komsumen='$alamat',telepon='$nohp',umur='$umurpnp',jenis_kelamin='$jekelamin',tmp_lahir='$tlahir',tanggal='$tgllahir',foto='".$_FILES["foto"]["name"]."' where no_identitas='$idpnp' ") or die (mysqli_error());

//jika query update sukses
		if($update){

  echo '<br/><br/>Data berhasil di Update! ';  //Pesan jika proses simpan sukses
  echo '<a href="entry_konsumen.php" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}else{

  echo 'Gagal menyimpan data! ';  //Pesan jika proses simpan gagal
  echo '<a href="edit.php?idp='.$id.'" class="btn">Kembali</a>'; //membuat Link untuk kembali ke halaman edit
  
}


?>

</div>
</div>


<?php include('template/footer.php'); ?>

