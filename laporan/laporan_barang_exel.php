<?php
	error_reporting(0);
	$koneksi = new mysqli("localhost","root","","db_emperium");

	$filename ="exel_barang-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename=$filename");
	header("content-type: application/vnd.ms-exel");


?>

<h2>Laporan Data Barang</h2>

<table border="1px">
	
	<tr>
		<th>No</th>
		<th>Nama Barang</th>
		<th>Harga Barang</th>
		<th>Stok</th>
		
	</tr>

	<?php

		$no=1;

		$sql = $koneksi->query("select * from tb_barang");

		while ($data=$sql->fetch_assoc()) {

			

	?>

	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $data['nama_barang'];?></td>
		<td><?php echo $data['harga'];?></td>
		<td><?php echo $data['jumlah_barang'];?></td>
		
		
	</tr>

	<?php } ?>

</table>