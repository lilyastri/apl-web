<h2> DATA DIRI PELANGGAN </h2>
<form action="mobil.php" method="post" enctype="multipart/form-data" >
	<table border="1">
		<tr>
			<td> NO POLISI </td>
			<td><input type="text" name="nopol" /></td>
		</tr>
		<tr>
			<td> MERK </td>
			<td><input type="text" name="merk" /></td>
		</tr>
		<tr>
			<td> WARNA </td>
			<td><input type="text" name="warna" /></td>
		</tr>
		<tr>
			<td> HARGA SEWA </td>
			<td><input type="text" name="harga_sewa" /></td>
		</tr>
		<tr>
			<td> Gambar [max=1.5MB] </td>
			<td><input type="file" name="foto" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			<input type="submit" value="simpan" name="proses" />
			<input type="reset" value="reset" name="reset" />
			</td>
		</tr>
	</table>
</form>