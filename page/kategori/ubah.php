<?php

	$id_kategori = $_GET['id'];

	$sql = $koneksi->query("select * from tb_kategori where id_kategori='$id_kategori'");

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
                                            <label>Nama Kategori</label>
                                            <input class="form-control" name="kategori" value="<?php echo $tampil['kategori'];?>" />
                                            
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

 	$kategori = $_POST ['kategori'];
 	
 	

 	$simpan = $_POST ['simpan'];


 	if ($simpan) {
 		
 		$sql = $koneksi->query("update tb_kategori set kategori='$kategori'");

 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					
 					alert ("Ubah Berhasil Disimpan");
 					window.location.href="?page=kategori";

 				</script>
 			<?php
 		}
 	}

 ?>
                             
                             

