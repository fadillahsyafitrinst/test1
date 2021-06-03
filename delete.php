<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['kode_buku'])){
	//membuat variabel $kode_buku yang menyimpan nilai dari $_GET['kode_buku']
	$kode_buku = $_GET['kode_buku'];
	
	//melakukan query ke database, dengan cara SELECT data yang memiliki kode_buku yang sama dengan variabel $kode_buku
	$cek = mysqli_query($koneksi, "SELECT * FROM buku WHERE kode_buku='$kode_buku'") or die(mysqli_error($koneksi));
	
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi kode_buku=$kode_buku
		$del = mysqli_query($koneksi, "DELETE FROM buku WHERE kode_buku='$kode_buku'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php";</script>';
		}
	}else{
		echo '<script>alert("kode buku tidak ditemukan di database."); document.location="index.php";</script>';
	}
}else{
	echo '<script>alert("kode buku tidak ditemukan di database."); document.location="index.php";</script>';
}

?>