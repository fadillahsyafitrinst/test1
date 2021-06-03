<head>
  <title>CARI BUKU</title>
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

      <?php 
      include 'config.php';
      ?>
      <div class="container" style="padding-top: 20px; padding-bottom: 20px;">
       <h3>Form Pencarian Buku</h3>
        <hr>
         <div class="row">
          <div class="col-sm-4">
          <form role="form" action="cari.php" method="get">
             <div class="form-group">
               <label>Cari Genre Buku:</label>
               <input type="text" name="cari" class="form-control">     
             </div>

              <button type="submit" class="btn btn-info btn-block">Search</button>
          </form> 
          </div>
         <div class="col-sm-8">
            <?php 
             if(isset($_GET['cari'])){
             $cari = $_GET['cari'];
             echo "<b>Hasil pencarian : ".$cari."</b>";
            }
            ?>
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
                 
                </tr>
              </thead>
              <tbody>

        
            <?php 
            if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $sql = mysqli_query($koneksi,"select * from buku where genre like '%".$cari."%'") or die(mysqli_error($koneksi));    
            }else{
            $sql = mysqli_query($koneksi,"select * from buku");  
            }
            $no = 1;
            while($data = mysqli_fetch_array($sql)){
            ?>
            <tr>
             <td><?php echo $no; ?></td>
             <td><?php echo $data['kode_buku']; ?></td>
             <td><?php echo $data['judul']; ?></td>
             <td><?php echo $data['penulis']; ?></td>
             <td><?php echo $data['penerbit']; ?></td>
             <td><?php echo $data['genre']; ?></td>
             <td><?php echo $data['sinopsis']; ?></td>
             <td><?php echo $data['stok']; ?></td>
             <td><?php echo $data['harga']; ?></td>
            </tr>
    
            <?php 
          $no++;
        } ?>
            </table>   
            </div> 
           </div>   
           </div>  
</body>
</html>