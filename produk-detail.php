<?php require "koneksi.php";
$nama = htmlspecialchars($_GET['nama']);
$queryProduk =  mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
$produk= mysqli_fetch_array($queryProduk);

$queryProdukTerkait =  mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]' LIMIT 4");
$produkTerkait = mysqli_fetch_array($queryProdukTerkait);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Detail Produk</title>
</head>
<body>
<?php require "navbar.php";?>
<div class="container-fluid py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <img src="image/<?php echo $produk['foto']?>" alt="" class="w-100">
      </div>
      <div class="col-md-6 offset-md-1">
      <h1><?php echo $produk['nama']?></h1>
      <p class="fs-5">Rp . 
        <?php echo $produk['detail']?>
      </p>
      <p class="text-harga"><?php echo $produk['harga']?></p>
      <p class="fs-5">Status Ketersediaan : <strong><?php echo $produk['ketersediaan_stok']?></strong></p>
      </div>
    </div>
  </div>
</div>

<!-- Produk Terkait -->

<div class="container-fluid py-5 warna2">
  <div class="container">
    <h2 class="text-center text-white mb-5">Produk Terkait</h2>
    <div class="row">

    <?php
    while($data = mysqli_fetch_array($queryProdukTerkait)){
?>
 <div class="col-lg-3 col-md-6 mb-3">
  <a href="produk-detail.php?nama=<?php echo $data['nama'];?>"></a>
      <img src="image/<?php echo $produk['foto']?>" class="img-fluid img-thumbnail produk-terkait-image" srcset="">
    </a>
    </div>
<?php

    }

    ?>
   
    </div>
  </div>
</div>

<!-- footer -->
<?php require "footer.php";?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>