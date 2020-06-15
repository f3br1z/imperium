<?php


$sql = $koneksi->query("select * from tb_barang");


$tampil = $sql->fetch_assoc();



?>
<div class="row">
    <div class="col-md-5">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    Items</h3>
            </div>
            <div class="panel-body">
                <!-- start item -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>
                                    <center>No</center>
                                </th>
                                <th>
                                    <center>Nama</center>
                                </th>
                                <th>
                                    <center>harga</center>
                                </th>
                                <th>
                                    <center>Stok</center>
                                </th>
                                <th>
                                    <center></center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $no = 1;

                            $sql_b = $koneksi->query("select * from tb_barang");

                            while ($data = $sql_b->fetch_assoc()) {




                            ?>
                                <tr align="center">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama_barang']; ?></td>
                                    <td><?php echo $data['harga']; ?></td>
                                    <td><?php echo $data['jumlah_barang']; ?></td>
                                    <td>
                                        <a href="index.php?page=transaksi_barang&id=<?php echo $data['id'] ?>" class="btn btn-success btn-xs">Beli</a>
                                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>

                                    </td>
                                </tr>
                            <?php } ?>

                            <?php
                            //  variable item sesioin yang di panggil

                            class Item
                            {
                                var $id; //var int
                                //var string
                                var $nama_barang;
                                //var float
                                var $harga;
                                //var int
                                var $jumlah;
                            }

                            if (isset($_GET['id']) && !isset($_POST['update'])) {
                                $sql_1 = "SELECT * FROM tb_barang WHERE id=" . $_GET['id'];
                                $result1 = mysqli_query($koneksi, $sql_1);
                                $barang1 = mysqli_fetch_object($result1);
                                $item = new Item();
                                $item->id = $barang1->id;
                                $item->nama_barang = $barang1->nama_barang;
                                $item->harga = $barang1->harga;
                                $iteminstock = $barang1->jumlah;
                                $item->jumlah = 1;
                                //Periksa produk dalam keranjang
                                $index = -1;
                                $keranjang = unserialize(serialize($_SESSION['keranjang']));
                                for ($i = 0; $i < count($keranjang); $i++)
                                    if ($keranjang[$i]->id == $_GET['id']) {
                                        $index = $i;
                                        break;
                                    }
                                if ($index == -1)
                                    $_SESSION['keranjang'][] = $item; //$ _SESSION ['keranjang']: set $ keranjang sebagai variabel _session
                                else {

                                    if (($keranjang[$index]->jumlah) < $iteminstock)
                                        $keranjang[$index]->jumlah++;
                                    $_SESSION['keranjang'] = $keranjang;
                                }
                            }
                            //Menghapus produk dalam keranjang
                            if (isset($_GET['hapus']) && !isset($_POST['update'])) {
                                $keranjang = unserialize(serialize($_SESSION['keranjang']));
                                unset($keranjang[$_GET['hapus']]);
                                $keranjang = array_values($keranjang);
                                $_SESSION['keranjang'] = $keranjang;
                            }
                            // Perbarui jumlah dalam keranjang
                            if (isset($_POST['update'])) {
                                $arrQuantity = $_POST['jumlah'];
                                $keranjang = unserialize(serialize($_SESSION['keranjang']));
                                for ($i = 0; $i < count($keranjang); $i++) {
                                    $keranjang[$i]->jumlah = $arrQuantity[$i];
                                }
                                $_SESSION['keranjang'] = $keranjang;
                            }
                            if (isset($_GET['bayar'])) {
                                //mengambil username
                                if ($_SESSION['admin']) {
                                    $user_l = $_SESSION['admin'];
                                } elseif ($_SESSION['user']) {
                                    $user_l = $_SESSION['user'];
                                }

                                $sql_u = $koneksi->query("select* from tb_user where id='$user_l'");
                                $data1 = $sql_u->fetch_assoc();
                                $data_u =  $data1['username'];

                                //mengambil jumlah belanja
                                $keranjang = unserialize(serialize($_SESSION['keranjang']));
                                $total_belanja = 0;
                                for ($i = 0; $i < count($keranjang); $i++) {
                                    $total_belanja += $keranjang[$i]->harga * $keranjang[$i]->jumlah;
                                }
                                // mengambil tanggal belanja
                                $tgl_belanja      = date('y-m-d');
                                //Simpan ke trbarang

                                $sql2 = $koneksi->query("insert into tb_trbarang (tanggal_belanja, total_belanja, username)values('$tgl_belanja', '$total_belanja', '$data_u')");
                                if ($sql2) {

                                    $id_trbarang1 = $koneksi->insert_id;
                                    $keranjang1 = unserialize(serialize($_SESSION['keranjang'])); //Set $keranjang1 sebagai array, serialize () mengubah string menjadi array
                                    for ($j = 0; $j < count($keranjang1); $j++) {

                                        $id_barang = $keranjang[$j]->id;
                                        $nama_barang = $keranjang[$j]->nama_barang;
                                        $harga = $keranjang[$j]->harga;
                                        $jumlah_beli = $keranjang[$j]->jumlah;
                                        //simpan ke tr_detail
                                        $sql1 = $koneksi->query("insert into tb_trdetail (id_transbarang, id_barang, nama_barang, harga_barang, jumlah_beli)values('$id_trbarang1','$id_barang', '$nama_barang', '$harga','$jumlah_beli')");
                                    }

                                    // //Menghapus semua produk dalam keranjang


                                    if ($sql1) {
                            ?>


                                        <script type="text/javascript">
                                            //   Cetak Faktur

                                            if (confirm("Cetak Vaktur")) {
                                                window.location.href = 'laporan/laporan_trbarang.php?kode=<?php echo $id_trbarang1; ?>';

                                            } else {
                                                alert("Transaksi telah berhasil");
                                            }
                                        </script>
                </div>
    <?php
                                        unset($_SESSION['keranjang']);
                                    }
                                }
                            }
    ?>



    </tbody>
    </table>
            </div>

        </div>
    </div>
</div>
<form method="POST">
    <div class="col-md-7">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                    Keranjang
                </h3>
            </div>
            <div class="panel-body">
                <!-- cart -->
                <div class="table-responsive">
                    <table id="myTable-cart" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <center>No</center>
                                </th>
                                <th>
                                    <center>Nama</center>
                                </th>
                                <th>
                                    <center>Harga</center>
                                </th>
                                <th>
                                    <center>Jumlah</center>
                                </th>
                                <th>
                                    <center>Total</center>
                                </th>
                                <th>
                                    <center></center>
                                </th>
                            </tr>
                        </thead>
                        <tbody> <?php

                                $no = 1;
                                $keranjang = unserialize(serialize($_SESSION['keranjang']));
                                $s = 0;
                                $hapus = 0;
                                for ($i = 0; $i < count($keranjang); $i++) {
                                    $s += $keranjang[$i]->harga * $keranjang[$i]->jumlah;
                                ?>
                                <tr>

                                    <td><?php echo $no++; ?> </td>
                                    <td> <?php echo $keranjang[$i]->nama_barang; ?> </td>
                                    <td>Rp. <?php echo $keranjang[$i]->harga; ?> </td>
                                    <td> <input type="number" min="1" value="<?php echo $keranjang[$i]->jumlah; ?>" name="jumlah[]"> </td>
                                    <td> Rp.<?php echo $keranjang[$i]->harga * $keranjang[$i]->jumlah; ?> </td>
                                    <td><a href="index.php?page=transaksi_barang&hapus=<?php echo $hapus; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
                                </tr>

                            <?php
                                    $index++;
                                } ?>
                            <hr />
                            <tr>
                                <td colspan="5" style="text-align:right; font-weight:bold">
                                    <input id="saveimg" type="image" src="images/refresh.png" name="update" alt="Save Button" style="width: 30px">
                                    <input type="hidden" name="update">
                                </td>
                                <td> Rp.<?php echo $s; ?> </td>
                            </tr>


                            </td>


                            </tr>
                    </table>
                    <!-- <input type="submit" name="bayar" value="bayar" class="btn btn-primary"> -->

</form>
</div>
<a href="index.php?page=transaksi_barang&bayar" class="btn btn-success btn-xs">Bayar</a>
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalbayar">
  Bayar
</button> -->
<!-- <a href="page/transaksi/chekout.php" class="btn btn-success btn-xs">Bayar</a> -->
<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>


</div>
</div>
</div>
</div>
<div class="modal fade" id="Modalbayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>