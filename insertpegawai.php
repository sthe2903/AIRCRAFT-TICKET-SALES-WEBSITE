<?php
include('koneksi/conn.php');
$nopgw=$_POST['no_pegawai'];
$nmpgw=$_POST['nama_pegawai'];
$alamat=$_POST['alamat_pegawai'];
$jekelamin=$_POST['jenis_kelamin'];
$umurpgw=$_POST['umur'];
$nohp=$_POST['telepon'];
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

$query	= "INSERT INTO tbl_pegawai values('$nopgw','$nmpgw','$alamat','$jekelamin','$umurpgw','$nohp','$tlahir','$tgllahir','".$_FILES["foto"]["name"]."')";
$result = mysqli_query($conn,$query) or die(mysqli_error()) ;
if($result){
	echo "<script type='text/javascript'>
	alert('Data Berhasil Disimpan..!');
</script>";
echo "<meta http-equiv='refresh' content='0; url=entry_pegawai.php'>";
}else{
	echo "<script type='text/javascript'>
	onload =function(){
		alert('data gagal disimpan!');
	}
</script>";

var_dump($_FILES);
//KEMBALI KE LIST.PHP
echo "data berhasil dimasukkan";
echo "<meta http-equiv=refresh content=3;url=entry_pegawai.php>";
}
?>


