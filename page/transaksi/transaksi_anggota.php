

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Transaksi Anggota
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Member</th>
                                            <th>Nama</th>
                                            <th>Tanggal expired</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $no = 1;
                                            $expired = 0;
                                            $sql = $koneksi->query("select * from tb_anggota where expired='$expired'");

                                            while ($data= $sql->fetch_assoc()) {
                                                
                                            

                                            
                                        ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['id_m'];?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['tgl_expired'];?></td>
                                            <td><span class="btn btn-xs btn-<?php echo $data['expired'] == 1 ? 'success' : 'danger' ?>"><?php echo $data['expired'] == 1 ? 'aktif' : 'tidak aktif'; ?></span></td>
                                            <td>

                                                <a href="?page=transaksi&aksi=bayar&id=<?php echo $data['id_m']; ?>" class="btn btn-info" ><i class="fa fa-edit">Bayar</i></a>
                                            </td>
                                        </tr>


                                        <?php  } ?>
                                    </tbody>

                                    </table>

                                  </div>

                                  

                        </div>
                     </div>
                   </div>
     </div>                           