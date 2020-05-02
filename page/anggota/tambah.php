<script type="text/javascript">
    function validasi(form){
        if (form.nama.value=="") {
            alert("Nama Tidak Boleh Kosng");
            form.nama.focus();
            return(false);
        }if (form.tmpt_lahir.value=="") {
            alert("tempat Lahir Tidak Boleh Kosong");
            form.tmpt_lahir.focus();
            return(false);
        }if (form.tgl.value=="") {
            alert("Tanggal Tidak Boleh Kosong");
            form.tgl.focus();
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
                                    
                                    <form method="POST" onsubmit="return validasi(this)">
                                        
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" id="nama" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" name="tmpt_lahir" id="tmpt_lahir" />
                                            
                                        </div>

                                          <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" type="date" name="tgl_lahir" id="tgl" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kelamin</label><br/>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="l" name="jk"  /> Laki-laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="p" name="jk"  /> Wanita
                                            </label>
                                            
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" name="alamat" id="alamat" />
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Nohp</label>
                                            <input class="form-control" name="nohp" id="nohp" />
                                            
                                        </div>
                                          	
                                        	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                        </div>
                                 </div>

                                 </form>
                              </div>
 </div>  
 </div>  
 </div>


 <?php

 	$nama = $_POST ['nama'];
 	$tmpt_lahir = $_POST ['tmpt_lahir'];
 	$tgl_lahir = $_POST ['tgl_lahir'];
    $jk = $_POST ['jk'];
    $alamat = $_POST ['alamat'];
    $nohp = $_POST ['nohp'];
 	$expired = 0; 
    $tgl_expired        = date('y-m-d');
   
 	$simpan = $_POST ['simpan'];


 	if ($simpan) {
      
 		$sql = $koneksi->query("insert into tb_anggota ( nama, tempat_lahir, tgl_lahir, jk, alamat, nohp, tgl_expired, expired )values( '$nama', '$tmpt_lahir', '$tgl_lahir', '$jk', '$alamat', '$nohp','$tgl_expired','$expired')");
         
        if ($sql) {
 			?>
             
 				<script type="text/javascript">
 					
 					alert ("Data Berhasil Disimpan haraf lakukan pembayaraan pertama");
 					window.location.href="?page=transaksi";

 				</script>
 			<?php
 		}
 	}

 ?>
                             
                             

