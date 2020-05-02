<?php
error_reporting(0);
$koneksi = new mysqli("localhost","root","","db_emperium");
$content ='

<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;     }
</style>


';


 $content .= '
<page>
<h1>Laporan barang</h1>
<br>
<table border="1px" class="tabel"  >
<tr>
<th>No </th>
<th>Nama Barang</th>
<th>Harga Barang</th>
<th>Stok</th>


</tr>';

$no=1;

$sql = $koneksi->query("select * from tb_barang");
while ($tampil=$sql->fetch_assoc()) {

	
      
	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['nama_barang'].'</td>
			<td align="center">'.$tampil['harga'].'</td>
			<td align="center">'.$tampil['jumlah_barang'].'</td>
			
			
		</tr>
	';
}

$content .='


</table>
</page>';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
?>
