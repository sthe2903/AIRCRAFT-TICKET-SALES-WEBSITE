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
		<h3>Data Tujuan Penerbangan</h3>
		<button class="print" onclick="PrintDoc()"><img src="http://localhost/cibot/img/print.png">Print Data</button>
		<button class="print" onclick="PrintPreview()"><img src="http://localhost/cibot/img/preview.png">Print Preview</button>

		<table id="tabel"  border="1" cellpadding="3" >
			<tr>
				<th style="width: 20px;">No</th>
				<th style="width: 50px;">Nomor Konsumen</th>
				<th style="width: 100px;">Nomor Tiket</th>
				<th>Tanggal Berangkat</th>
				<th>Hari Berangkat</th>
				<th>Waktu Berangkat</th>
				<th>Kode Tujuan</th>

			</tr>
			<?php include('koneksi/conn.php'); 
			$sql = "SELECT * FROM tbl_tiket ORDER BY no_tiket ASC"; 
			$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
			$no=1;
			while ($data = mysqli_fetch_array ($hasil)){
				$id=$data['no_tiket'];
				?>
				<tr>

					<td><?php echo $no++?></td>
					<td><?php echo $data['no_konsumen'];?></td>
					<td><?php echo $data['no_tiket']; ?></td>
					<td><?php echo $data['tgl_berangkat']; ?></td>
					<td><?php echo $data['hari_berangkat']; ?></td>
					<td><?php echo $data['waktu_berangkat']; ?></td>
					<td><?php echo $data['no_tujuan']; ?></td>

				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<?php include('template/footer.php'); ?>