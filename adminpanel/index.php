<?php
require "session.php";
require "../koneksi.php";
$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

$queryProduk = mysqli_query($con, "SELECT * FROM produk");
$jumlahProduk = mysqli_num_rows($queryProduk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
  .summary-kategori{
    background-color: #0a6b4a;
    border-radius: 10px;
  }
</style>
  <title>Home</title>
</head>
<body>
  <?php
  require "navbar.php";
  ?>
  
  <div class="container">
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <i class="bi bi-house"></i><li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>  
  <p>hallo <?php echo $_SESSION['username']?></p>
<div class="container">
  <div class="row">
    <div class="col-lg-4  col-md-6 col-sm-12 mb-3">
      <div class="summary-kategori p-3">
<div class="row">
  <div class="col-6"><i class="bi bi-slash-square-fill text-white fs-3"></i></div>
  <div class="col-6 text-white">
    <h3 class="fs-4">Kategori</h3>
    <p class="fs-5"><?php echo $jumlahKategori;?> Kategori</p>
  <p>
    <a href="kategori.php" class="text-white text-decoration-none">Lihat Detail</a>
  </p>
  </div>
  </div>
</div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
      <div class="summary-kategori p-3">
<div class="row">
  <div class="col-6"><i class="bi bi-slash-square-fill text-white fs-3"></i></div>
  <div class="col-6 text-white">
    <h3 class="fs-4">Produk</h3>
    <p class="fs-5"><?php echo $jumlahProduk;?> Produk</p>
  <p>
    <a href="kategori.php" class="text-white text-decoration-none">Lihat Detail</a>
  </p>
  </div>
  </div>
</div>
    </div>
  </div>
</div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>