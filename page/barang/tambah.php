<script type="text/javascript" >
    function validasi(form){
        if (form.nama_barang.value=="") {
            alert("Nama Tidak Boleh Kosong");
            form.nama.focus();
            return (false);
        }if (form.harga.value=="") {
            alert("Pengarang Tidak Boleh Kosong");
            form.harga.focus();
            return(false);
        }if (form.jumlah_barang.value=="") {
            alert("Penerbit Tidak Boleh Kosong");
            form.jumlah_barang.focus();
            return(false);

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
                                            <label>Nama Barang</label>
                                            <input class="form-control" name="nama_barang" id="nama_barang" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control" name="harga" id="harga" />
                                            
                                        </div>
                                        <div class="form-group">
                                        <label> Kategori </label>
                                        <select class="form-control" name="kategori" id="kategori">
                                            <?php

                                           
                                                $query2 = $koneksi->query("SELECT * FROM tb_kategori ORDER by id_kategori");
                                                
                                                while ($kategori=$query2->fetch_assoc()) {
                                                    echo "<option value='$kategori[id_kategori].$kategori[kategori]'>$kategori[kategori]</option>";
                                                }
                        
                    

                                            ?>
                                            
                                        </select>
                                      </div>  
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input class="form-control" name="jumlah_barang" id="jumlah_barang" />
                                            
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

    $nama_barang = $_POST ['nama_barang'];
    $dapat_kategori		= isset($_POST['kategori']) ? $_POST['kategori'] : "";
    $pecah_kategori		= explode (".", $dapat_kategori);
    $id_kategori		= $pecah_kategori[0];
    $nama_kategori      = $pecah_kategori[1];
 	$harga = $_POST ['harga'];
 	$jumlah_barang = $_POST ['jumlah_barang'];
     
 	$simpan = $_POST ['simpan'];


 	if ($simpan) {
 		
 		$sql = $koneksi->query("insert into tb_barang (nama_barang, kategori, harga, jumlah_barang )values('$nama_barang', '$nama_kategori', '$harga', '$jumlah_barang')");

 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					
 					alert ("Data Berhasil Disimpan");
 					window.location.href="?page=barang";

 				</script>
 			<?php
 		}
 	}

 ?>
                             
                             

