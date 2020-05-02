<?php
error_reporting(0);
$koneksi = new mysqli("localhost", "root", "", "db_emperium");
$content = '

<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;   }
</style>


';


$content .= '
<page>
<h1>Laporan Transaksi Barang</h1>
<br>
<table border="1px" class="tabel"  >
<tr>
<th>No </th>
<th>Nama Barang</th>
<th>Harga Barang</th>
<th>Tanggal Belanja</th>
<th>Jumlah Beli</th>
<th>Total Belanja</th>
</tr>';

if (isset($_POST['cetak'])) {



    $tgl1 = $_POST['tanggal1'];
    $tgl2 = $_POST['tanggal2'];

    $total = 0;
    $no = 1;

    $sql = $koneksi->query("select * from tb_trbarang where tanggal_belanja between '$tgl1' and '$tgl2' ");
    while ($tampil = $sql->fetch_assoc()) {
        $total += $tampil['total_belanja'];

        $content .= '
		<tr>
			<td align="center">' . $no++ . '</td>
			<td align="center">' . $tampil['nama_barang'] . '</td>
			<td align="center">' . $tampil['harga_barang'] . '</td>
			<td align="center">' . $tampil['tanggal_belanja'] . '</td>
			<td align="center">' . $tampil['jumlah_beli'] . '</td>
			<td align="center">' . $tampil['total_belanja'] . '</td>
		</tr>
	';
    }
} else {

    $no = 1;
    $total = 0;
    $sql = $koneksi->query("select * from tb_trbarang");
    while ($tampil = $sql->fetch_assoc()) {
        $total += $tampil['total_belanja'];
        $content .= '
		<tr>
        <td align="center">' . $no++ . '</td>
        <td align="center">' . $tampil['nama_barang'] . '</td>
        <td align="center">' . $tampil['harga_barang'] . '</td>
        <td align="center">' . $tampil['tanggal_belanja'] . '</td>
        <td align="center">' . $tampil['jumlah_beli'] . '</td>
        <td align="center">' . $tampil['total_belanja'] . '</td>
		</tr>
	';
    }
}

$content .= '

<tr>
		                    <td colspan="5">TOTAL</td>
		                    <td align="center">' . $total . '</td>
	                                     </tr> 
</table>
</page>';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P', 'A4', 'fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
