<?php
	

	$id_m = $_GET['id'];

	$sql = $koneksi->query("select * from tb_anggota where id_m = '$id_m'");

	$tampil = $sql->fetch_assoc();

    $jkl = $tampil['jk'];
    


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
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" value="<?php echo $tampil['nama']?>"/>
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" name="tmpt_lahir" value="<?php echo $tampil['tempat_lahir']?>" />
                                            
                                        </div>

                                          <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $tampil['tgl_lahir']?>"  />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kelamin</label><br/>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="l" name="jk" <?php echo($jkl==l)?"checked":"";?> /> Laki-laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="p" name="jk" name="jk" <?php echo($jkl==p)?"checked":""; ?> /> Wanita
                                            </label>
                                            
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" name="alamat" value="<?php echo $tampil['alamat']?>" />
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>No Hp</label>
                                            <input class="form-control" name="nohp" value="<?php echo $tampil['nohp']?>" />
                                            
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

 	$nama = $_POST ['nama'];
 	$tmpt_lahir = $_POST ['tmpt_lahir'];
 	$tgl_lahir = $_POST ['tgl_lahir'];
 	$jk = $_POST ['jk'];
    $alamat = $_POST ['alamat'];
    $nohp = $_POST ['nohp'];
 	
 	$simpan = $_POST ['simpan'];


 	if ($simpan) {
 		
 		$sql = $koneksi->query("update  tb_anggota set nama='$nama', tempat_lahir='$tmpt_lahir', tgl_lahir='$tgl_lahir', jk='$jk', alamat='$alamat', nohp='$nohp' where id_m = '$id_m' ");
 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					
 					alert ("Data Berhasil Disimpan");
 					window.location.href="?page=anggota";

 				</script>
 			<?php
 		}
     }

 ?>
                             
                             

