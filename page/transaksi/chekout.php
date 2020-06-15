<?php

session_start();
$koneksi = new mysqli("localhost", "root", "", "db_emperium");


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

//mengambil username

if ($_SESSION['admin']) {
    $user_l = $_SESSION['admin'];
} elseif ($_SESSION['user']) {
    $user_l = $_SESSION['user'];
}

$sql_u = $koneksi->query("select* from tb_user where id='$user_l'");
$data = $sql_u->fetch_assoc();
$data_u =  $data['username'];

//mengambil jumlah belanja
$keranjang = unserialize(serialize($_SESSION['keranjang']));
$total_belanja = 0;
for ($i = 0; $i < count($keranjang); $i++) {
    $total_belanja += $keranjang[$i]->harga * $keranjang[$i]->jumlah;
}
// mengambil tanggal belanja
$tgl_belanja      = date('y-m-d');
//Simpan ke trbarang

$sql = $koneksi->query("insert into tb_trbarang (tanggal_belanja, total_belanja, username)values('$tgl_belanja', '$total_belanja', '$data_u')");
if ($sql) {

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
            alert("Transaksi telah berhasil");
        </script>
<?php
        unset($_SESSION['keranjang']);
    }
}

?>