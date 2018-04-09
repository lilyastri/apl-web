<?php
	include "koneksi.php";
	$sql = "select * from mobil";
	$hasil = mysqli_query($kon, $sql);
	if (!$hasil)
		die("Gagal query..".mysqli_error($kon));
?>
<table border="1">
	<tr>
		<th>No polisi</th>
		<th>merk</th>
		<th>warna</th>
		<th>harga sewa</th>
		<th>foto</th>
		<th> Details</th>
	</tr>
	<?php
		$no = 0;
		while ($row = mysqli_fetch_assoc($hasil)) {
			echo " <tr> ";
			echo "   <td> ".$row['nopol']." </td> " ;
			echo "   <td> ".$row['merk']." </td> " ;
			echo "   <td> ".$row['warna']." </td> " ;
			echo "   <td> ".$row['harga_sewa']." </td> " ;
			echo "   <td> <a href='pict/{$row['foto']} '/>
			<img src='thumb/t_{$row['foto']} ' width='100' />
			</a> </td> ";
			echo " <td> ";
		echo " <a href='mobil_edit.php?kode=" . $row['nopol'] . "'>
		Edit </a>";
		echo " &nbsp &nbsp";
		echo " <a href='mobil_hapus.php?kode=" . $row['nopol'] . "'>
		Hapus </a>";
		echo " &nbsp &nbsp";
		echo " <a href='mobil_details.php?kode=" . $row['nopol'] . "'>
		Lihat Mobil </a>";
		echo "</td>";
			echo " <tr> ";
		}
	?>
</table>