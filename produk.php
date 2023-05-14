<?php require "koneksi.php";
$queryKategori = mysqli_query($con, "SELECT * FROM kategori"); 

// get produk by nama produk/keyword
if(isset($_GET['keyword'])){
  $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
}
// get produk by kategori
else if(isset($_GET['kategori'])){
  $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
  $kategoriId = mysqli_fetch_array($queryGetKategoriId);
  echo $kategoriId['id'];
  echo "</br>";
  echo $kategoriId['id'];
}
// get produk default 
else{

}
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
  <title>Online Shop | Produk</title>
</head>
<body>
  <?php require "navbar.php";?>
  <!-- banner -->
  <div class="container-fluid banner-produk d-flex align-items-center">
    <div class="container">
      <h1 class="text-white text-center">Produk</h1>
    </div>
  </div>
<!-- body -->
<div class="container py-5">
  <div class="row">
    <div class="col-lg-3 mb-5">
      <h3>Kategori</h3>
    <ul class="list-group ">
      <?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
        <a class="decoration-none" href="produk.php?kategori=<?php echo $kategori['id']; ?>">
  <li class="list-group-item"><?php echo $kategori['nama']; ?></li></a>
<?php } ?>
</ul>
    </div>
    <div class="col-lg-9">
      <h3 class="text-center mb-3">Produk</h3>
      
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>