<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT BUKU</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
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
		<h2>Edit buku</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['kode_buku'])){
			//membuat variabel $kode_buku untuk menyimpan kode_buku dari GET kode_buku di URL
			$kode_buku = $_GET['kode_buku'];
			
			//query ke database SELECT tabel buku berdasarkan kode_buku = $kode_buku
			$select = mysqli_query($koneksi, "SELECT * FROM buku WHERE kode_buku='$kode_buku'") or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">Kode Buku tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){

			$kode_buku		= $_POST['kode_buku'];
			$judul			= $_POST['judul'];
			$penulis		= $_POST['penulis'];
			$penerbit		= $_POST['penerbit'];
			$genre			= $_POST['genre'];
			$sinopsis		= $_POST['sinopsis'];
			$stok			= $_POST['stok'];
			$harga			= $_POST['harga'];
			
			if($harga<1){
					echo '<div class="alert alert-warning">Gagal, Masukkan harga yang benar.</div>';
				}
				else{
			$sql = mysqli_query($koneksi, "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', genre='$genre', sinopsis='$sinopsis', stok='$stok', harga='$harga' WHERE kode_buku='$kode_buku'") or die(mysqli_error($koneksi));
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?kode_buku='.$kode_buku.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}}
		}
		?>
		
		<form action="edit.php?kode_buku=<?php echo $kode_buku; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode Buku</label>
				<div class="col-sm-10">
					<input type="text" name="kode_buku" class="form-control" size="4" value="<?php echo $data['kode_buku']; ?>" readonly required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">JUDUL BUKU</label>
				<div class="col-sm-10">
					<input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">PENULIS BUKU</label>
				<div class="col-sm-10">
					<input type="text" name="penulis" class="form-control" value="<?php echo $data['penulis']; ?>" required>
				</div>
			</div>
		

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">PENERBIT BUKU</label>
				<div class="col-sm-10">
					<input type="text" name="penerbit" class="form-control" value="<?php echo $data['penerbit']; ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">GENRE BUKU</label>
				<div class="col-sm-10">
					<select name="genre" class="form-control" required>
						<option value="">PILIH GENRE</option>
						<option value="Aksi dan Petualangan" <?php if($data['genre'] == 'Aksi dan Petualangan'){ echo 'selected'; } ?>>Aksi dan Petualangan</option>
						<option value="Klasik" <?php if($data['genre'] == 'Klasik'){ echo 'selected'; } ?>>Klasik</option>
						<option value="Komik" <?php if($data['genre'] == 'Komik'){ echo 'selected'; } ?>>Komik</option>
						<option value="Detektif dan Misteri" <?php if($data['genre'] == 'Detektif dan Misteri'){ echo 'selected'; } ?>>Detektif dan Misteri</option>
						<option value="Fantasi" <?php if($data['genre'] == 'Fantasi'){ echo 'selected'; } ?>>Fantasi</option>
						<option value="Fiksi Sejarah" <?php if($data['genre'] == 'Fiksi Sejarah'){ echo 'selected'; } ?>>Fiksi Sejarah</option>
						<option value="Horor" <?php if($data['genre'] == 'Horor'){ echo 'selected'; } ?>>Horor</option>
						<option value="Romance" <?php if($data['genre'] == 'Romance'){ echo 'selected'; } ?>>Romance</option>
					</select>
				</div>
			</div>

			<div class="form-group">
            <label>Sinopsis</label>
            <textarea name="sinopsis" class="form-control" rows="5"placeholder="Masukan Sinopsis" required><?php echo $data['sinopsis']; ?></textarea>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">STOK BUKU</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="stok" value="Banyak (>30)" <?php if($data['stok'] == 'Banyak (>30)'){ echo 'checked'; } ?>  required>
						<label class="form-check-label">Banyak (>30)</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="stok" value="Sedang (>20)" <?php if($data['stok'] == 'Sedang (>20)'){ echo 'checked'; } ?>  required>
						<label class="form-check-label">Sedang (>20)</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="stok" value="Sedikit (<10)" <?php if($data['stok'] == 'Sedikit (<10)'){ echo 'checked'; } ?>  required>
						<label class="form-check-label">Sedikit (<10)</label>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">HARGA BUKU</label>
				<div class="col-sm-10">
					<input type="number" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" required>
				</div>
			</div>

			

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>