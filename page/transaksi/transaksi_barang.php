<?php


$sql = $koneksi->query("select * from tb_barang");


$tampil = $sql->fetch_assoc();


?>
<div class="row">
    <div class="col-md-6">
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

                            $sql = $koneksi->query("select * from tb_barang");

                            while ($data = $sql->fetch_assoc()) {




                            ?>
                                <tr align="center">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['nama_barang']; ?></td>
                                    <td><?php echo $data['harga']; ?></td>
                                    <td><?php echo $data['jumlah_barang']; ?></td>
                                    <td>
                                        <a href="index.php?page=transaksi_barang&keranjang&id=<?php echo $data['id'] ?>" class="btn btn-success btn-xs">Beli</a>
                                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>

                                    </td>
                                </tr>
                            <?php } ?>

                            <?php

                            if (isset($_GET['keranjang'])) {

                                $id = intval($_GET['id']);

                                if (isset($_SESSION['cart'][$id])) {

                                    $_SESSION['cart'][$id]['quantity']++;
                                } else {

                                    $sql_s = "SELECT * FROM tb_barang
                                                WHERE id={$id}";
                                    $query_s = mysql_query($sql_s);
                                    if (mysql_num_rows($query_s) != 0) {
                                        $row_s = mysql_fetch_array($query_s);

                                        $_SESSION['cart'][$row_s['id']] = array(
                                            "quantity" => 1,
                                            "harga" => $row_s['harga']
                                        );
                                    } else {

                                        $message = "This product id it's invalid!";
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
    <div class="col-md-6">
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
                                    <center>stok</center>
                                </th>
                                <th>
                                    <center></center>
                                </th>
                            </tr>
                        </thead>
                        <tbody> <?php
                                if (isset($_SESSION['cart'])) {

                                    $sql = "SELECT * FROM products WHERE id_product IN (";

                                    foreach ($_SESSION['cart'] as $id => $value) {
                                        $sql .= $id . ",";
                                    }

                                    $sql = substr($sql, 0, -1) . ") ORDER BY name ASC";
                                    $query = mysql_query($sql);
                                    while ($row = mysql_fetch_array($query)) {

                                ?>
                                    <p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['id']]['quantity'] ?></p>
                                <?php

                                    }
                                ?>
                                <hr />
                                <a href="index.php?page=kerangjang">Go to cart</a>
                            <?php

                                } else {

                                    echo "<p>Keranjang Kosong Silahkan Tambah Barang.</p>";
                                }

                            ?>

                            </td>
                            </tr>
                    </table>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#myTable-cart').DataTable();
                    });
                </script>

                <!-- cart -->
            </div>
        </div>
    </div>
</div>