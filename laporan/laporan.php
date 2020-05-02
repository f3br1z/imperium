<?php
error_reporting(0);
$koneksi = new mysqli("localhost","root","","db_emperium");
$content ='

<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;   }
</style>


';


 $content .= '
<page>
<h1>Laporan Transaksi</h1>
<br>
<table border="1px" class="tabel"  >
<tr>
<th>No </th>
<th>ID Member</th>
<th>Nama Member</th>
<th>Nama Paket</th>
<th>Tanggal Bayar</th>
<th>Biaya Paket</th>
<th>Biaya Admin</th>
<th>Total</th>
</tr>';

if (isset($_POST['cetak'])) {


	
	$tgl1 = $_POST['tanggal1'];
	$tgl2 = $_POST['tanggal2'];

	$total=0;
		
	
	$sql = $koneksi->query("select * from tb_tranggota where tgl_bayar between '$tgl1' and '$tgl2' ");
	while ($tampil=$sql->fetch_assoc()) {
		$total += $tampil['total'];

	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['id_m'].'</td>
			<td align="center">'.$tampil['nama'].'</td>
			<td align="center">'.$tampil['nama_paket'].'</td>
			<td align="center">'.$tampil['tgl_bayar'].'</td>
			<td align="center">'.$tampil['biaya_paket'].'</td>
			<td align="center">'.$tampil['biaya_admin'].'</td>
			<td align="center">'.$tampil['total'].'</td>
		</tr>
	';
	
}
}else{

$no=1;
$total=0;
$sql = $koneksi->query("select * from tb_tranggota");
while ($tampil=$sql->fetch_assoc()) {
	$total += $tampil['total'];
	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['id_m'].'</td>
			<td align="center">'.$tampil['nama'].'</td>
			<td align="center">'.$tampil['nama_paket'].'</td>
			<td align="center">'.$tampil['tgl_bayar'].'</td>
			<td align="center">'.$tampil['biaya_paket'].'</td>
			<td align="center">'.$tampil['biaya_admin'].'</td>
			<td align="center">'.$tampil['total'].'</td>
		</tr>
	';
}
}

$content .='

<tr>
		                    <td colspan="7">TOTAL</td>
		                    <td>'.$total.'</td>
	                                     </tr> 
</table>
</page>';

require_once('../assets/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
?>
