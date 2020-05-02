<?php
	
	$id_m = $_GET ['id'];

	$koneksi->query("delete from tb_anggota where id_m ='$id_m'");

?>


<script type="text/javascript">
		window.location.href="?page=anggota";
</script>