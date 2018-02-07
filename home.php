<?php
session_start();
if(isset($_SESSION['login'])) {

?>

<!DOCTYPE html>
<html>
<head>
	<title>Beranda</title>
</head>
<body>

<a href="logout.php">Log Out</a>

<h3>Data Warga</h3>
<a href="warga_tambah.php">Tambah Data </a>

<table>
	
	<tr>
		<th style="width: 10px">No</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Tanggal Lahir</th>
		<th>Agama</th>
	</tr>
	<?php

include 'proses/koneksi.php';

$sql = mysqli_query($connect,"SELECT *, warga.id as id_warga,  warga.nama as nama_warga, user.nama as nama_user FROM datawarga ");

$no = 1;
while($row = mysqli_fetch_array($sql)) {
	echo "
	<tr>
		<td>".$no++."</td>
		<td>".$row['nama_warga']."</td>
		<td>".(($row['jenis_kelamin'] == 'l') ? 'laki - laki' : 'perempuan')."</td>
		<td>".date("d F Y", strtotime($row['tanggal_lahir']))."</td>
		<td>".$row['agama']."</td>
		<td>
			<a href='warga_edit.php?ID=$row[id_warga]'>
				edit 
			</a>

			<a href='proses/warga_proses_hapus.php?ID=$row[id_warga]'>
				hapus
			</a>
		</td>	
	</tr>

	";
}
	?>
</table>


</body>
</html>

<?php
} else {
	echo "please <a  href='index.php'>login</a>";
}
?>