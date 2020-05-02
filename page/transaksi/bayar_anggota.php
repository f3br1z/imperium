<?php
	


	$id_m = $_GET['id'];

    $sql = $koneksi->query("select * from tb_anggota where id_m = '$id_m'");
   

    $tampil = $sql->fetch_assoc();
    

 
    


?>

<div class="panel panel-primary">
<div class="panel-heading">
		Transaksi Anggota
 </div> 
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST" >
                                    
                                    <div class="form-group">
                                        <tr>
                        <td id="noborder">ID Anggota</td>
                        <td id="noborder">:</td>
                        <td id="noborder">			
			<?php echo $tampil['id_m'];?>
			<input name=id_m type=hidden id=input size=30 maxlength=70 value="<?php echo $tampil['id_m'];?>" />
			</td>
                      </tr>
                                        </div>

                                        <div class="form-group">
                                        <tr>
                        <td id="noborder">Nama Anggota</td>
                        <td id="noborder">:</td>
                        <td id="noborder">			    
			<?php echo $tampil['nama'];?>
			<input name=nama type=hidden id=input size=30 maxlength=70 value="<?php echo $tampil['nama'];?>" />
			</td>
                      </tr>
                                        </div>                                        
                                          <div class="form-group">
                                          <tr>
                        <td id="noborder">Tanggal Expired</td>
                        <td id="noborder">:</td>
                        <td id="noborder">			
			<?php echo $tampil['tgl_expired'];?>
			<input name=tgl_expired type=hidden id=input size=30 maxlength=70 value="<?php echo $data['tgl_expired'];?>" />
			</td>
                      </tr>        
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
                                        
                                        <div class="form-group">
                                            <label>Administrasi</label>
                                            <input class="form-control" name="administrasi" id="administrasi" />
                                            
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

    $id_anggota = $_POST ['id_m'];
 	$nama       = $_POST ['nama'];
 	
  
    $dapat_paket		= isset($_POST['paket']) ? $_POST['paket'] : "";
    $pecah_paket		= explode (".", $dapat_paket);
    $nama_paket			= $pecah_paket[0];
    $harga_paket        = $pecah_paket[1];
    $durasi_paket       = $pecah_paket[2];
    $tgl_bayar          = date('y-m-d');
    $tgl_expired        = date('y-m-d', strtotime("+$durasi_paket days"));
    $administrasi       = $_POST['administrasi'];
    $total              = $administrasi+$harga_paket;
    $expired_anggota    = 1;
 	
 	$bayar = $_POST ['bayar'];


 	if ($bayar) {
        $qt = $koneksi->query("INSERT INTO tb_tranggota VALUES (null, '$id_anggota','$nama', '$nama_paket', '$tgl_bayar', '$harga_paket', '$administrasi','$total')") or die ("Gagal Masuk".mysql_error());
 		$ql = $koneksi->query("update  tb_anggota set tgl_expired='$tgl_expired', expired='$expired_anggota' where id_m = '$id_anggota' ");
       
         if ($qt&&$ql) {
 			?>
 				<script type="text/javascript">
 					
 					alert ("Data Berhasil Dibayar");
 					window.location.href="?page=transaksi_anggota";

 				</script>

 			<?php
 		}
     }

 ?>
                             
                             

