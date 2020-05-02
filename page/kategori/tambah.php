<script type="text/javascript" >
    function validasi(form){
        if (form.nama_kategori.value=="") {
            alert("Nama kategori Tidak Boleh Kosong");
            form.nama_kategori.focus();
            return(false);
        }

        return(true);
    }
</script>

<div class="panel panel-primary">
<div class="panel-heading">
		Tambah Data
 </div> 
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <form method="POST" onsubmit="return validasi(this)" >
                                        <div class="form-group">
                                            <label>Nama Kategori </label>
                                            <input class="form-control" name="kategori" id="kategori" />
                                            
                                        </div>


                                        
                                        <div>
                                        	
                                        	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                        </div>
                                 </div>

                                 </form>
                              </div>
 </div>  
 </div>  
 </div>


 <?php

 	$nama_kategori = $_POST ['kategori'];
 	
 	$simpan = $_POST ['simpan'];


 	if ($simpan) {
 		
 		$sql = $koneksi->query("insert into tb_kategori (kategori)values('$nama_kategori')");

 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					
 					alert ("Data Berhasil Disimpan");
 					window.location.href="?page=kategori";

 				</script>
 			<?php
 		}
 	}

 ?>
                             
                             

