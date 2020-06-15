<?php
error_reporting(0);
$koneksi = new mysqli("localhost", "root", "", "db_emperium");
$id_trbarang = $_GET['kode'];
$content = '

<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;   }
</style>


';

$sql_tanggal = $koneksi->query("select * from tb_trbarang where id_transbarang = '$id_trbarang' ");
$tampil1 = $sql_tanggal->fetch_assoc();
$tanggal_belanja = $tampil1['tanggal_belanja'];
$total_belanja	= $tampil1['total_belanja'];
$kasir = $tampil1['username'];
$content .= '
<page>
<h1>Laporan Transaksi Barang </h1>
<h5>
Nomor Transaksi :
' . $id_trbarang . '&nbsp;&nbsp;
 Tanggal : ' . $tanggal_belanja . ' &nbsp;&nbsp; Oleh ' . $kasir . '
 </h5>
<br>
<table border="1px" class="tabel"  >
<tr>
<th>No </th>
<th>Nama Barang</th>
<th>Harga Barang</th>
<th>Jumlah Beli</th>
</tr>
';



$no = 1;

$sql = $koneksi->query("select * from tb_trdetail where id_transbarang = '$id_trbarang' ");
while ($tampil = $sql->fetch_assoc()) {

	$content .= '
	    	<tr>
	        <td align="center">' . $no++ . '</td>
	        <td align="center">' . $tampil['nama_barang'] . '</td>
	        <td align="center">' . $tampil['harga_barang'] . '</td>
	        <td align="center">' . $tampil['jumlah_beli'] . '</td>
	    	</tr>
	    ';
}

$content .= '

<tr>
		                    <td colspan="3">TOTAL</td>
		                    <td align="center">' . $total_belanja . '</td>
	                                     </tr> 
</table>
<br>
<h4><==>Emperium Gym<==> </h4>
</page>';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P', 'A4', 'fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
