<?php
	$nopol = $_POST['nopol'];
	$merk = $_POST['merk'];
	$warna = $_POST['warna'];
	$harga_sewa = $_POST ['harga_sewa'];
	
	$foto = $_FILES['foto']['name'];
	$tmpName = $_FILES['foto']['tmp_name'];
	$size = $_FILES['foto']['size'];
	$type = $_FILES['foto']['type'];
	
	$maxsize = 1500000;
	$typeygblh = array("image/jpeg","image/png","image/pjpeg");
	
	$dirFoto = "pict";
	if(!is_dir($dirFoto))
		mkdir($dirFoto);
	$fileTujuanFoto = $dirFoto."/".$foto;
	
	$dirThumb = "thumb";
	if(!is_dir($dirThumb))
		mkdir($dirThumb);
	$fileTujuanThumb = $dirThumb."/t_".$foto;
	
	$dataValid="YA";
	
	if ($size > 0){
		if ($size > $maxsize){
			echo "ukuran file terlalu besar <br/>";
			$dataValid="TIDAK";
		}
		if (!in_array($type, $typeygblh)) {
			echo "Type file tidak dikenal <br/>";
			$dataValid="TIDAK";
		}
	}
	
	if (strlen(trim($nopol))==0){
		echo "nopol Harus Diisi! <br/>";
		$dataValid ="TIDAK";
	}
	if (strlen(trim($merk))==0) {
		echo "merk Harus Diisi! <br />";
		$dataValid = "TIDAK";
	}
	if (strlen(trim($warna))==0) {
		echo "warna Harus diisi! <br/>";
		$dataValid = "TIDAK";
	}
	if (strlen(trim($harga_sewa))==0) {
		echo "harga sewa Harus diisi! <br/>";
		$dataValid = "TIDAK";
	}
	if ($dataValid == "TIDAK") {
		echo "Masih Ada Kesalahan, silahkan perbaiki! </br>";
		echo "<input type='button' value='Kembali'
			onClick='self.history.back()'>";
		exit;
	}
	
	include "konek.php";
	
	$sql ="insert into mobil
			(nopol,merk,warna,harga_sewa,foto)
			values
			($nopol,'$merk','$warna',$harga_sewa,'$foto')";
		$hasil = mysqli_query($kon, $sql);
	
	if (!$hasil) {
		echo "Gagal Simpan, silahkan diulangi! <br />";
		echo mysqli_error($kon);
		echo"<br/> <input type='button' value='Kembali'
			onClick='self.history.back()'>";
			exit;
		}else{
		echo "Simpan data behasil";
		}
	if ($size > 0) {
	if (!move_uploaded_file($tmpName, $fileTujuanFoto)) {
		echo "Gagal upload Gambar.. <br/>";
		echo "<a href='barang_tampil.php'>Daftar Barang</a>";
		exit;
	} else {
		buat_thumbnail($fileTujuanFoto, $fileTujuanThumb);
		}
	}
	
	echo "<br/>File sudah di upload. <br/>";

	function buat_thumbnail($file_src, $file_dst) {
	//hapus jika thumbnail sebelumnya sudah ada
	list($w_src,$h_src,$type) = getImageSize($file_src);
	
	switch ($type){
		case 1: //gif -> jpg
			$img_src = imagecreatefromgif($file_src);
			break;
		case 2: //jpeg -> jpg
			$img_src = imagecreatefromjpeg($file_src);
			break;
		case 3: //png -> jpg
			$img_src = imagecreatefrompng($file_src);
			break;
	}
	
	$thumb = 100; //max size untuk thumb
	if ($w_src > $h_src){
		$w_dst = $thumb; //landscape
		$h_dst = round($thumb / $w_src * $h_src);
	} else {
		$w_dst = round($thumb / $h_src * $w_src);  //potrait
		$h_dst = $thumb;
	}
	
	$img_dst = imagecreatetruecolor($w_dst, $h_dst); //resample
	
	imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0,
		$w_dst, $h_dst, $w_src, $h_src);
		imagejpeg($img_dst, $file_dst); //simpan thumbnail
		//bersihkan memori
		imagedestroy($img_src);
		imagedestroy($img_dst);
}	
?>
<hr/>
<a href="mobil_tampil.php">Lihat Data Mobil</a> <hr/>
