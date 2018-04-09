<?php
	$no_pelanggan = $_POST['no_pelanggan'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$alamat = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
	
	
	$dataValid="YA";
	
	if (strlen(trim($no_pelanggan))==0){
		echo "no pelanggan harus diisi! <br/>";
		$dataValid ="TIDAK";
	}
	
	if (strlen(trim($nama_pelanggan))==0){
		echo "nama pelanggan harus diisi! <br/>";
		$dataValid ="TIDAK";
	}
	
	if (strlen(trim($alamat))==0){
		echo "alamat harus diisi! <br/>";
		$dataValid ="TIDAK";
	}
	
	if (strlen(trim($no_hp))==0){
		echo "no hp harus diisi! <br/>";
		$dataValid ="TIDAK";
	}
	
	if ($dataValid == "TIDAK"){
		echo "Silahkan isi data diri secara lengkap! <br/>";
		echo "<input type='button' value='Kembali'
			onClick='self.history.back()'> ";
			exit;
	}
	include "koneksi.php";
	
	$sql = "insert into pelanggan
		(no_pelanggan,nama_pelanggan,alamat,no_hp)
		values
		($no_pelanggan,'$nama_pelanggan','$alamat','$no_hp')";
	$hasil = mysqli_query($kon, $sql);
	
	if (!$hasil) {
	echo " gagal simpan ! silahkan ulangi kembali! <br/>";
	echo mysqli_error ($kon);
	echo "<br/> <input type='button' value='Kembali'
		onClick='self.history.back()'>";
		exit;
		}else{
		echo "simpan data berhasil";
		}
		
?>
<a href="pelanggan_tampil.php">Lihat Data Pelanggan</a> <hr/>
<a href="mobil_tampil.php">Pilih Data Mobil</a> <hr/>

