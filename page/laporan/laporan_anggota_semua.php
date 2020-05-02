

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Transaksi anggota
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Transaksi</th>
                                            <th>ID Member</th>
                                            <th>Nama</th>
                                            <th>Nama Paket</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Biaya Paket</th>
                                            <th>Biaya Admin</th>
                                            <th>Total</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $no = 1;
                                            $total = 0;

                                            $sql = $koneksi->query("select * from tb_tranggota");

                                            while ($data= $sql->fetch_assoc()) {
                                                
                                           $total += $data['total'];
                                               
                                                
                                            
                                        ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['id_tranggota'];?></td>
                                            <td><?php echo $data['id_m'];?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['nama_paket'];?></td>
                                            <td><?php echo $data['tgl_bayar'];?></td>
                                            <td><?php echo $data['biaya_paket'];?></td>
                                            <td><?php echo $data['biaya_admin'];?></td>
                                            <td><?php echo $data['total'];?></td>
                                            
                                        </tr>


                                        <?php  } ?>
                                        <tr>
		                    <td colspan="8">TOTAL</td>
		                    <td><?php echo $total ?></td>
	                                     </tr>
                                    </tbody>

                                    </table>

                                  </div>

                                  <a href="?page=laporan&aksi=cetak" class="btn btn-success" style="margin-top: 8px;"><i class="fa fa-print"></i> Cetak</a>

                                  

                                  


                        </div>
                     </div>
                   </div>
     </div>                           