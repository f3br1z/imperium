<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Data Transaksi Barang
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Tanggal Transksi</th>
                                <th>Total Belanja</th>
                                <th>Kasir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            $sql = $koneksi->query("select * from tb_trbarang");

                            while ($data = $sql->fetch_assoc()) {




                            ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['id_transbarang']; ?></td>
                                    <td><?php echo $data['tanggal_belanja']; ?></td>
                                    <td><?php echo $data['total_belanja']; ?></td>
                                    <td><?php echo $data['username']; ?></td>


                                    <td>
                                        <a href="laporan/laporan_trbarang.php?kode=<?php echo $data['id_transbarang']; ?>" class="btn btn-info"><i class="fa fa-edit"></i> Detail Pdf</a>

                                    </td>
                                </tr>


                            <?php  } ?>
                        </tbody>
                    </table>


                </div>

                <a href="?page=transaksi_barang" class="btn btn-success" style="margin-top:  8px;"><i class="fa fa-plus"></i>Belanja</a>


            </div>
        </div>
    </div>
</div>