
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Barang
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $no = 1;

                                            $sql = $koneksi->query("select * from tb_barang");

                                            while ($data= $sql->fetch_assoc()) {

                                               
                                                
                                           
                                        ?>


                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama_barang'];?></td>
                                            <td><?php echo $data['kategori'];?></td>
                                            <td><?php echo $data['harga'];?></td>
                                            <td><?php echo $data['jumlah_barang'];?></td>
                                            <td>
                                                <a href="?page=barang&aksi=ubah&id=<?php echo $data['id']; ?>" class="btn btn-info" ><i class="fa fa-edit"></i> Ubah</a>
                                                <a onclick="return confirm('Anda Yakin Akan Mengahapus Data Ini ... ???')" href="?page=barang&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger" ><i class="fa fa-trash"></i> Hapus</a>

                                            </td>
                                        </tr>


                                        <?php  }
                                        
                                         ?>
                                    </tbody>
                            </table>


                                  </div>

                                  <a href="?page=barang&aksi=tambah" class="btn btn-success" style="margin-top:  8px;"><i class="fa fa-plus"></i> Tambah Data</a>

                                  <a href="./laporan/laporan_barang_exel.php" class="btn btn-default" target="blank" style="margin-top: 8px; margin-left: 5px;"><i class="fa fa-print"></i> ExportToExel</a>

                                  <a href="./laporan/laporan_barang.php" class="btn btn-default" target="blank" style="margin-top: 8px; margin-left: 5px;"><i class="fa fa-print"></i> ExportToPdf</a>
                        </div>
                     </div>
                   </div>
     </div>                           