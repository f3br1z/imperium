<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Data Anggota Expired
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Member</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Tanggal expired</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            $sql = $koneksi->query("select * from tb_anggota where expired = 0");

                            while ($data = $sql->fetch_assoc()) {

                                $jk = ($data['jk'] == l) ? "Laki-laki" : "Wanita";



                            ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['id_m']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['tempat_lahir']; ?></td>
                                    <td><?php echo $data['tgl_lahir']; ?></td>
                                    <td><?php echo $jk; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td><?php echo $data['nohp']; ?></td>
                                    <td><?php echo $data['tgl_expired']; ?></td>
                                    <td><span class="btn btn-xs btn-<?php echo $data['expired'] == 1 ? 'success' : 'danger' ?>"><?php echo $data['expired'] == 1 ? 'aktif' : 'tidak aktif'; ?></span></td>

                                </tr>


                            <?php  } ?>
                        </tbody>

                    </table>

                </div>


            </div>
        </div>
    </div>
</div>