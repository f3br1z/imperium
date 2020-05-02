<?php
	error_reporting(0);
	$koneksi = new mysqli("localhost","root","","db_emperium");

	$filename ="exel_anggota-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename=$filename");
	header("content-type: application/vnd.ms-exel");


?>

<h2>Laporan Data Anggota</h2>

<table border="1px">
	
	<tr>
		<th>No</th>
		<th>ID Member</th>
		<th>Nama</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<th>No Hp</th>
	</tr>

	<?php

		$no=1;

		$sql = $koneksi->query("select * from tb_anggota");

		while ($data=$sql->fetch_assoc()) {

			$jk = ($tampil['jk']==l)?"Laki-laki":"Wanita";

      		
			
		

	?>

	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $data['id_m'];?></td>
		<td><?php echo $data['nama'];?></td>
		<td><?php echo $data['tempat_lahir'];?></td>
		<td><?php echo $data['tgl_lahir'];?></td>
		<td><?php echo $jk;?></td>
		<td><?php echo $data['alamat'];?></td>
		<td><?php echo $data['nohp	'];?></td>
		
	</tr>

	<?php } ?>

</table>