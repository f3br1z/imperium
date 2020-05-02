<script type="text/javascript" >
    function validasi(form){
        if (form.nama_paket.value=="") {
            alert("Nama Paket Tidak Boleh Kosong");
            form.nama_paket.focus();
            return(false);
        }if (form.harga.value=="") {
            alert("Harga Tidak Boleh Kosong");
            form.harga.focus();
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
                                            <label>Nama Paket</label>
                                            <input class="form-control" name="nama_paket" id="nama_paket" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control" name="harga" id="harga" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Durasi Hari</label>
                                            <input class="form-control" name="durasi" id="durasi" />
                                            
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

 	$nama_paket = $_POST ['nama_paket'];
    $harga = $_POST ['harga'];
    $durasi = $_POST['durasi'];
 	
 	$simpan = $_POST ['simpan'];


 	if ($simpan) {
 		
 		$sql = $koneksi->query("insert into tb_paket (nama_paket, harga, durasi)values('$nama_paket', '$harga', '$durasi')");

 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					
 					alert ("Data Berhasil Disimpan");
 					window.location.href="?page=paket";

 				</script>
 			<?php
 		}
 	}

 ?>
                             
                             

