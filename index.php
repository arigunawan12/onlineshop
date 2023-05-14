<?php 
require "koneksi.php";
$queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6"); 

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

  <title>Document</title>
</head>
<body>

<?php require "navbar.php"; ?>
<!-- banner -->
<div class="container-fluid d-flex align-items-center banner">
  <div class="container text-center text-white">
  <h1>Toko Online Fashion</h1>
  <h3>Mau Cari Apa?</h3>
    <div class="col-md-8 offset-md-2">
    <form action="produk.php" method="get">
  <div class="input-group input-group-lg my-4">
  <input type="text" class="form-control" placeholder="Nama Produk" name="keyword" aria-describedby="basic-addon2 ">
  <button class="btn warna5 text-white" type="submit">Cari</button>
  </div>
    </form>
    </div>
  </div>
</div>
<!-- Kategori -->
<div class="container-fluid py-5">
  <div class="container text-center">
    <h3>Kategori Terlaris</h3>
    <div class="row mt-5">
      <div class="col-md-4 mb-3">
        <div class="highlighted-kategori kategori_1 d-flex align-items-center">
          <h4 class="text-white text-left ms-4"><a href="produk.php?kategori=baju pria" class="decoration-none">Baju Pria</a></h4>
        </div>
      </div>
      <div class="col-md-4 mb-3">
      <div class="highlighted-kategori kategori_2 d-flex align-items-center justify-content-center">
          <h4 class="text-white"><a href="produk.php?kategori=baju wanita" class="decoration-none">Baju Wanita</a></h4>
        </div>
      </div>
      <div class="col-md-4 mb-3">
      <div class="highlighted-kategori kategori_3 d-flex align-items-center justify-content-end">
          <h4 class="text-white me-4"><a href="produk.php?kategori=sepatu" class="decoration-none">Sepatu</a></h4>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Tentang Kami -->
<div class="container-fluid warna3">
  <div class="container">
    <h3>Tentang Kami</h3>
    <p class="fs-5 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum quae doloremque est? Ea eaque mollitia ullam velit, iure ipsa provident voluptas culpa laboriosam dolores, sunt eveniet, aliquam eum non! Modi odit voluptate excepturi minus porro voluptas quidem, est illo, provident odio fugiat nam praesentium aliquam hic velit dignissimos ab eaque minima officiis libero! Obcaecati, animi ad quam repellat ut, provident laudantium blanditiis consequatur aut quia similique ipsa ipsum asperiores saepe nisi quasi dolore suscipit quisquam facilis corporis. Quaerat, expedita in.</p>

  </div>
</div>
<!-- Produk -->
<div class="container-fluid py-5">
  <div class="container text-center">
    <h3>Produk</h3>
    <div class="row mt-5">

    <?php while($data = mysqli_fetch_array($queryProduk)){ ?>
      <div class="col-md-4 col-sm-3 mb-3">
      <div class="card h-100">
<div class="image-box">
<img src="image/<?php echo $data['foto']?>";  class="card-img-top" alt="...">
</div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $data['nama']?></h5>
    <p class="card-text text-truncate"><?php echo $data['detail']?></p>
    <p class="card-text text-harga">Rp.<?php echo $data['harga']?></p>
    <a href="produk-detail.php?nama=<?php echo $data['nama']?>" class="btn warna2 text-white">Lihat Detail</a>
  </div>
</div>
      </div>

<?php } ?>
      
    </div>
    <a class="btn btn-outline-warning mt-3" href="produk.php">See More</a>
  </div>
</div>


<!-- Footer -->
<!-- Footer -->

<?php require "footer.php";?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>