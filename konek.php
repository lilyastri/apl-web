<?php
error_reporting(E_ALL ^ E_DEPRECATED);
 $host = "localhost";
 $user = "root";
 $pass ="";
 $dbName = "rentalPacar";
 
 $kon= mysqli_connect($host, $user, $pass);
 if (!$kon)
	die("Gagal Koneksi...");

$hasil = mysqli_select_db($kon, $dbName);
if (!$hasil) {
 $hasil = mysqli_query($kon, "CREATE DATABASE $dbName");
	if(!$hasil)
	die("Gagal Buat Database");
else
	$hasil = mysqli_select_db($kon, $dbName);
	if (!$hasil) die ("Gagal Konek Database");
}

$sqlTabelPelanggan = "create table if not exists pelanggan ( 
					no_pelanggan int auto_increment not null primary key,
					nama_pelanggan varchar(40) not null,
					alamat varchar(40) not null,
					no_hp varchar(40) not null,
					KEY(no_pelanggan) )";
					
mysqli_query ($kon, $sqlTabelPelanggan) or die("Gagal Buat Tabel pelanggan");
$sqlTabelmobil ="create table if not exists mobil (
				nopol int auto_increment not null primary key,
				merk varchar (40) not null,
				warna varchar(40) not null,
				harga_sewa int not null default 0,
				foto varchar(70) not null default '',
				KEY(nopol) )";
			
mysqli_query ($kon, $sqlTabelmobil) or die("Gagal buat Tabel Header mobil");
				
?>