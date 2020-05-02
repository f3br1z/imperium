<?php

	$id = $_GET['id'];

	$sql = $koneksi->query("select * from tb_barang where id='$id'");

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
                                            <label>Nama Barang</label>
                                            <input class="form-control" name="nama_barang" value="<?php echo $tampil['nama_barang'];?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control" name="harga" value="<?php echo $tampil['harga'];?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input class="form-control" name="jumlah_barang" value="<?php echo $tampil['jumlah_barang'];?>" />
                                            
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

 	$nama_barang = $_POST ['nama_barang'];
 	$harga = $_POST ['harga'];
 	$jumlah_barang = $_POST ['jumlah_barang'];
 	

 	$simpan = $_POST ['simpan'];


 	if ($simpan) {
 		
 		$sql = $koneksi->query("update tb_barang set nama_barang='$nama_barang', harga='$harga', jumlah_barang='$jumlah_barang' where id='$id'");

 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					
 					alert ("Ubah Berhasil Disimpan");
 					window.location.href="?page=barang";

 				</script>
 			<?php
 		}
 	}

 ?>
                             
                             

