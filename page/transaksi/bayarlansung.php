

<div class="panel panel-primary">
<div class="panel-heading">
		Transaksi Visit
 </div> 
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" >
                                 <div class="form-group">
                                            <label>Nama Visitor</label>
                                            <input class="form-control" name="nama" id="nama" />
                                            
                                        </div>



                                        <div class="form-group">
                                        <label> Paket</label>
                                        <select class="form-control" name="paket">
                                            <?php

                                           
                                                $query2 = $koneksi->query("SELECT * FROM tb_paket ORDER by id_paket");
                                                
                                                while ($paket=$query2->fetch_assoc()) {
                                                    echo "<option value='$paket[nama_paket].$paket[harga].$paket[durasi]'>$paket[nama_paket]</option>";
                                                }
                        
                    

                                            ?>
                                            
                                        </select>
                                      </div>  
                                        
                                        <div>
                                        	
                                        	<input type="submit" name="bayar" value="Bayar" class="btn btn-primary">
                                        </div>
                                 </div>

                                 </form>
                              </div>
 </div>  
 </div>  
 </div>


 <?php

    
 	$nama       = $_POST ['nama'];
 	
  
    $dapat_paket		= isset($_POST['paket']) ? $_POST['paket'] : "";
    $pecah_paket		= explode (".", $dapat_paket);
    $nama_paket			= $pecah_paket[0];
    $harga_paket        = $pecah_paket[1];
    $durasi_paket       = $pecah_paket[2];
    $tgl_bayar          = date('y-m-d');
    $tgl_expired        = date('y-m-d', strtotime("+1 days"));
    $total              = $harga_paket;
    $expired_anggota    = 1;
 	
 	$bayar = $_POST ['bayar'];


 	if ($bayar) {
        $qt = $koneksi->query("INSERT INTO tb_tranggota VALUES (null, '$id_anggota','$nama', '$nama_paket', '$tgl_bayar', '$harga_paket', '$administrasi','$total')") or die ("Gagal Masuk".mysql_error());
       
         if ($qt) {
 			?>
 				<script type="text/javascript">
 					
 					alert ("Data Berhasil Dibayar");
 					window.location.href="?page=laporan";

 				</script>

 			<?php
 		}
     }

 ?>
                             
                             

