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

$query	= "INSERT INTO tbl_konsumen values('$idpnp','$nmpnp','$alamat','$nohp','$umurpnp','$jekelamin','$tlahir','$tgllahir','".$_FILES["foto"]["name"]."')";
$result = mysqli_query($conn,$query)or die(mysqli_error());
if($result){
	echo "<script type='text/javascript'>
	alert('Data Berhasil Disimpan..!');
</script>";
echo "<meta http-equiv='refresh' content='0; url=entry_konsumen.php'>";
}else{
	echo "<script type='text/javascript'>
	onload =function(){
		alert('data gagal disimpan!');
	}
</script>";

var_dump($_FILES);
//KEMBALI KE LIST.PHP
echo "data berhasil dimasukkan";
echo "<meta http-equiv=refresh content=3;url=entry_konsumen.php>";
}
?>


