<?php

	$id = $_GET['id'];
	$judul = $_GET['judul'];


	$sql = $koneksi->query("update tb_transaksi set status='kembali' where id = '$id'");
	$buku = $koneksi->query("update  tb_buku set jumlah_buku = (jumlah_buku+1) where judul='$judul' ");


	if ($sql || $buku) {
		
		?>

			<script type="text/javascript">
				
				alert("Buku Berhasil Dikembalikan");

				window.location.href="?page=transaksi";

			</script>

		<?php
	}

?>