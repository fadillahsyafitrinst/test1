<?php
//memasukkan file config.php
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>STARBOOKS STORE</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>

  <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="logo1.png" width="100px"></a>
      <a class="navbar-brand" href="#">STARBOOKS</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav nav-tabs">
        	<li class="nav-item">
		    <a class="nav-link " aria-current="page" href="index.php">Home</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="tambah.php">Tambah</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="cari.php">Search</a>
		  </li>
        </ul>
      </div>
    </div>
  </nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Daftar Buku</h2>
		
		<hr>
		
		<table class="table table-striped table-hover dtabel">
			<thead class="thead-dark">
				<tr>
					<th>NO.</th>
					<th>KODE BUKU</th>
					<th>JUDUL BUKU</th>
					<th>PENULIS BUKU</th>
					<th>PENERBIT BUKU</th>
					<th>GENRE BUKU</th>
					<th>SINOPSIS</th>
					<th>STOK BUKU</th>
					<th>HARGA BUKU</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel buku urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY kode_buku ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['kode_buku'].'</td>
							<td>'.$data['judul'].'</td>
							<td>'.$data['penulis'].'</td>
							<td>'.$data['penerbit'].'</td>
							<td>'.$data['genre'].'</td>
							<td>'.$data['sinopsis'].'</td>
							<td>'.$data['stok'].'</td>
							<td>'.$data['harga'].'</td>
							<td>
								<a href="edit.php?kode_buku='.$data['kode_buku'].'" class="badge badge-warning">Edit</a>
								<a href="delete.php?kode_buku='.$data['kode_buku'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	
	
</body>
</html>