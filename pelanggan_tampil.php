<?php
	include "koneksi.php";
	$sql = "select * from pelanggan ";
	$hasil = mysqli_query($kon, $sql);
	if (!$hasil)
		die("Gagal query..".mysqli_error($kon));
?>
<table border="1">
	<tr>
		<th>No Pelanggan</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>No hp</th>
		<th>Details</th>
	</tr>
	<?php
		$no = 0;
		while ($row = mysqli_fetch_assoc($hasil)) {
			echo " <tr> ";
			echo "   <td> ".$row['no_pelanggan']." </td> " ;
			echo "   <td> ".$row['nama_pelanggan']." </td> " ;
			echo "   <td> ".$row['alamat']." </td> " ;
			echo "   <td> ".$row['no_hp']." </td> " ;
			echo " <td> ";
		echo " <a href='pelanggan_edit.php?kode=" . $row['no_pelanggan'] . "'>
		Edit </a>";
		echo " &nbsp &nbsp";
		echo " <a href='pelanggan_hapus.php?kode=" . $row['no_pelanggan'] . "'>
		Hapus </a>";
		echo "</td>";
		
			echo " <tr> ";
		}
	?>
</table>
	