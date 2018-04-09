<?php
$merk = "";
if(isset($_POST["merk"]))
	$merk = $_POST["merk"] ;

	include "konek.php";
	$sql = "select * from mobil where merk like '%".$merk."%' order by nopol desc";
	$hasil = mysqli_query($kon, $sql);
	if (!$hasil)
		die("Gagal Query...".mysqli_error($kon));
?>
<a href="input_mobil.php">INPUT MOBIL</a>
&nbsp &nbsp &nbsp;
<a href="mobil_cari.php" >CARI MOBIL</a>
&nbsp &nbsp &nbsp;
<a href="mobil_tampil.php" >DAFTAR MOBIL</a>
<h1> ~INFORMASI MOBIL~ </h1>
<table border="1">
	<tr> 
	<th>No Polisi</th>
	<th>Merk</th>
	<th>Warna</th>
	<th>Harga Sewa</th>
	<th>Foto</th>
	<th>Sewa</th>
	</tr>
<?php
		$no = 0;
		$row = mysqli_fetch_assoc($hasil);
		echo " <tr> ";
		echo " <td> ".$row['nopol']." </td> ";
		echo " <td> ".$row['merk']." </td> ";
		echo " <td> ".$row['warna']." </td> ";
		echo " <td> ".$row['harga_sewa']." </td> ";
		echo "</td>";
				echo " <td> <a href='pict/{$row['foto']}' />
				<img src='thumb/t_{$row['foto']}' width='100' />
				</a> </td>";
				echo " <td> ";
		echo " <a href='sewa.php?kode=" . $row['nopol'] . "'>
		Ambil Sewa </a>";
		echo "</td>";
			echo " <tr> ";
		echo "</tr>";
	?>
</table>