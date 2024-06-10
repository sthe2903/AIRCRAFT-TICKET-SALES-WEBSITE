<table id="tabel"  border="1" cellpadding="3" >
	<tr>
		<th style="width: 20px;">No</th>
		<th style="width: 50px;">Nomor Pembayaran</th>
		<th style="width: 60px;">Nomor Tiket</th>
		<th style="width: 100px;">Tanggal Pembayaran</th>
		<th style="width: 60px;">Hari Pembayaran</th>
		<th style="width: 20px;">Jumlah Tiket</th>
		<th>Harga Tiket</th>
		<th>Total Pembayaran</th>
		<th style="width: 40px;">Delete</th>
		<th style="width: 40px;">Edit</th>
	</tr>
	<?php include('koneksi/conn.php'); 
	$sql = "SELECT * FROM tbl_pembayaran ORDER BY no_pembayaran ASC"; 
	$hasil=mysqli_query($conn,$sql) or die(mysqli_error());
	$no=1;
	while ($data = mysqli_fetch_array ($hasil)){
		$id=$data['no_pembayaran'];
		$harga=$data['harga_tiket'];
		$total=$data['total_pembayaran'];
		?>
		<tr>

			<td><?php echo $no++?></td>
			<td><?php echo $data['no_pembayaran'];?></td>
			<td><?php echo $data['no_tiket']; ?></td>
			<td><?php echo $data['tgl_pembayaran']; ?></td>
			<td><?php echo $data['hari_pembayaran']; ?></td>
			<td><?php echo $data['jumlah_tiket']; ?></td>
			<td>Rp <?php echo number_format($harga,0,".","."); ?></td>
			<td>Rp <?php echo number_format($total,0,".","."); ?></td>
			<td class="delete">
				<a href="deletepembayaran.php?id_pembayaran=<?php echo $id ?>" onclick="return confirm('Apakah anda yakin?')" class="btn-aksi"> <img src="img/delete.png" alt="Delete Data"></a>
			</td>
			<td class="edit">
				<a href="editpembayaran.php?id_pembayaran=<?php echo $id?>" class="btn-aksi"><img src="img/edit.png" alt="Edit Dasta"></a>
			</td>
			
		</tr>
		<?php } ?>
	</table>
