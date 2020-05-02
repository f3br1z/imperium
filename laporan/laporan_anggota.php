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
<h1>Laporan Anggota</h1>
<br>
<table border="1px" class="tabel"  >
<tr>
<th>No </th>
<th>ID Member</th>
<th>Nama</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Jenis Kelamin</th>
<th>Alamat</th>
<th>No Hp</th>

</tr>';

$no=1;

$sql = $koneksi->query("select * from tb_anggota");
while ($tampil=$sql->fetch_assoc()) {

	 $jk = ($tampil['jk']==l)?"Laki-laki":"Wanita";

      
	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['id_m'].'</td>
			<td align="center">'.$tampil['nama'].'</td>
			<td align="center">'.$tampil['tempat_lahir'].'</td>
			<td align="center">'.$tampil['tgl_lahir'].'</td>
			<td align="center">'.$jk.'</td>
			<td align="center">'.$tampil['alamat'].'</td>
			<td align="center">'.$tampil['nohp'].'</td>
			
			
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
