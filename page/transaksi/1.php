

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Transaksi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Nama</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Terlambat</th>
                                            
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $no = 1;

                                            $sql = $koneksi->query("select * from tb_transaksi where status='pinjam' ");

                                            while ($data= $sql->fetch_assoc()) {


                                            	
                                                
                                           
                                        ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['judul'];?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['tgl_pinjam'];?></td>
                                            <td><?php echo $data['tgl_kembali'];?></td>

                                            <td><?php echo $data['status'];?></td>
                                            
                                            <td>
                                            	<?php
                                            	$denda = 1000;

                                            	$tanggal_dateline = $data['tgl_expired'];

                                            	$tgl_expired=date('Y-m-d');

                                            	$lambat = ($tanggal_dateline, $tgl_expired);

                                            	$denda1 = $lambat*$denda;

                                            	if ($lambat>0) {
                                            		echo "<font color='red'>$lambat hari <br> (Rp $denda1)</font>";
                                            	}else{
                                            		echo $lambat. "hari";
                                            	}

                                            	?>



                                            </td>
                                            
                                            <td>
                                                <a href="?page=transaksi&aksi=kembali&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul']?>" class="btn btn-info" >Kembali</a>
                                                <a href="?page=transaksi&aksi=perpanjang&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul'];?>&tgl_kembali=<?php echo $data['tgl_kembali']?>&lambat=<?php echo $lambat; ?>" class="btn btn-danger" >Perpanjang</a>

                                            </td>
                                        </tr>


                                        <?php  } ?>
                                    </tbody>

                                    </table>
                                  </div>

                                  <a href="?page=transaksi&aksi=tambah" class="btn btn-success" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data</a>

                                  <a href="./laporan/laporan_transaksi_exel.php" class="btn btn-default" target="blank" style="margin-top: 8px; margin-left: 5px;"><i class="fa fa-print"></i> ExportToExel</a>

                                  <a href="./laporan/laporan_transaksi.php" class="btn btn-default" target="blank" style="margin-top: 8px; margin-left: 5px;"><i class="fa fa-print"></i> ExportToPdf</a>
                        </div>
                     </div>
                   </div>
     </div>                          