<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$nama_user=$_GET['nama_user'];
$sql = mysqli_query($koneksi,"SELECT tawaran,kata_kunci,alamat,provinsi,harga,kamar_tidur,luas,sertifikat, foto_rumah FROM tb_rumah WHERE nama_user='$nama_user'");
$html = '<center><h3>Daftar Pesanan Anda</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
<tr>
<th><center>No</center></th>
<th><center>Tawaran</center></th>
<th><center>Kata Kunci</center></th>
<th><center>Alamat</center></th>
<th><center>Provinsi</center></th>
<th><center>Harga (Rp)</center></th>
<th><center>Kamar Tidur</center></th>
<th><center>Luas (m2)</center></th>
<th><center>Sertifikat</center></th>
<th><center>foto rumah</center></th>
</tr>';

$no = 1;
while($row=mysqli_fetch_array($sql)){
	$html .= "<tr>
	<td>".$no."</td>
    <td>".$row['tawaran']."</td>
    <td>".$row['kata_kunci']."</td>
    <td>".$row['alamat']."</td>
    <td>".$row['provinsi']."</td>
    <td>".$row['harga']."</td>
    <td>".$row['kamar_tidur']."</td>
    <td>".$row['luas']."</td>
    <td>".$row['sertifikat']. "</td>
    <td style='text-align: center;'><img src='storage/".$row['foto_rumah']."' style='width: 120px;''></td>
	</tr>";
	$no++;
}

$html .= "</html>";
$dompdf -> loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf -> setPaper('A2','landscape');
// rendering dari html ke pdf
$dompdf -> render();
// melakukan output file pdf
$dompdf -> stream('laporan_iklan.pdf');

?>