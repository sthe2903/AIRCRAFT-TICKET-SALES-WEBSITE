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
				<th style="width: 50px;">Nama Konsumen</th>
				<th style="width: 100px;">Nomor Tiket</th>
				<th>Tanggal Berangkat</th>
				<th>Hari Berangkat</th>
				<th>Waktu Berangkat</th>
				<th>Kode Tujuan</th>
				<th>Jumlah tiket</th>
				<th>Tagihan</th>

			</tr>
			<?php include('koneksi/conn.php'); 
			$sql = "SELECT * FROM tbl_konsumen inner join tbl_tiket on tbl_konsumen.no_identitas=tbl_tiket.no_konsumen join tbl_pembayaran on tbl_tiket.no_tiket=tbl_pembayaran.no_tiket  "; 
			$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
			$no=1;
			while ($data = mysqli_fetch_array ($hasil)){
				$id=$data['no_tiket'];
				$identitas=$data['no_identitas'];
				$total=$data['total_pembayaran'];
				?>
				<tr>
					
					<td><?php echo $no++?></td>
					<td><a href="single_view.php?id_pembelian=<?php echo $identitas?>"><?php echo $data['no_konsumen'];?></a></td>
					<td><?php echo $data['nama_konsumen'];?></td>
					<td><?php echo $data['no_tiket']; ?></td>
					<td><?php echo $data['tgl_berangkat']; ?></td>
					<td><?php echo $data['hari_berangkat']; ?></td>
					<td><?php echo $data['waktu_berangkat']; ?></td>
					<td><?php echo $data['no_tujuan']; ?></td>
					<td><?php echo $data['jumlah_tiket']; ?></td>
					<td><?php echo number_format($total,0,".","."); ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<?php include('template/footer.php'); ?>