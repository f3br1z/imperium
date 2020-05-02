<?php

	$id_paket = $_GET['id'];

	$sql = $koneksi->query("select * from tb_paket where id_paket='$id_paket'");

	$tampil = $sql->fetch_assoc();

?>

<div class="panel panel-primary">
<div class="panel-heading">
		Ubah Data
 </div> 
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <form method="POST" >
                                        <div class="form-group">
                                            <label>Nama Paket</label>
                                            <input class="form-control" name="nama_paket" value="<?php echo $tampil['nama_paket'];?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control" name="harga" value="<?php echo $tampil['harga'];?>" />
                                            
                                        </div>

										<div class="form-group">
                                            <label>Durasi</label>
                                            <input class="form-control" name="durasi" value="<?php echo $tampil['durasi'];?>" />
                                            
                                        </div>

                                        <div>
                                        	
                                        	<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                                        </div>
                                 </div>

                                 </form>
                              </div>
 </div>  
 </div>  
 </div>


 <?php

 	$nama_paket = $_POST ['nama_paket'];
 	$harga = $_POST ['harga'];
 	$durasi = $_POST['durasi'];

 	$simpan = $_POST ['simpan'];


 	if ($simpan) {
 		
 		$sql = $koneksi->query("update tb_paket set nama_paket='$nama_paket', harga='$harga', durasi='$durasi' where id_paket='$id_paket'");

 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					
 					alert ("Ubah Berhasil Disimpan");
 					window.location.href="?page=paket";

 				</script>
 			<?php
 		}
 	}

 ?>
                             
                             

