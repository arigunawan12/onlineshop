<?php
require "session.php";
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahkategori = mysqli_num_rows($queryKategori);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
  <?php
  include "navbar.php";
  ?>
  <div class="container mt-5">
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item" aria-current="page"><a href="../adminpanel/"><i class="bi bi-house"></i>Home</li></a>
  <li class="breadcrumb-item active" aria-current="page">Kategori</li>
  </ol>
</nav> 
<div class="my-5 col-12 col-md-6">
  <h3>Tambah Kategori</h3>
  <form action="" method="post">
    <div>
    <label for="kategori">Kategori</label>
    <input type="text" name="kategori" id="kategori" placeholder="Input Kategori" class="form-control">
    </div>
    <div class="mt-3">
      <button type="submit" class="btn btn-primary" name="simpan_kategori">Simpan Kategori</button>
      
    </div>
  </form>
  
</div>
<?php 

if(isset($_POST['simpan_kategori'])){
  $kategori = htmlspecialchars($_POST['kategori']);
  $queryExist = mysqli_query($con,"SELECT nama FROM kategori WHERE nama='$kategori'");
  $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

  if($jumlahDataKategoriBaru > 0){
    ?>
    <div class="alert alert-danger mt-3" role="alert">Kategori Sudah Ada</div>
    <?php
  }else{
    $querySimpan = mysqli_query($con,"INSERT INTO kategori (nama) VALUES ('$kategori')");
    if($querySimpan){
      ?>
      <div class="alert alert-primary mt-3" role="alert">Kategori Berhasil Tersimpan</div>
      <meta http-equiv="refresh" content="2; url=kategori.php">
      <?php
    }else{
      echo mysqli_error($con);
    }
  
  
  }
}?>

<div class="mt-3">
  <h2>List Kategori</h2>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody><?php
    if($jumlahkategori == 0){ ?>
        <tr><td colspan="3">Tidak ada data Kategori</td></tr><?php
    }; 
      $number =1;
      while($data = mysqli_fetch_array($queryKategori)){
        if($jumlahkategori > 0){
          ?> <tr>
          <td><?php echo $number?></td>
          <td><?php echo $data['nama'];?></td>
          <td><a href="kategori-detail.php?p=<?php echo $data['id'];?>" class="btn btn-info"><i class="bi bi-search"></i></a></td>
        </tr>
          <?php
        }
        $number ++;
      }
      ?>
    </tbody>
  </table>
</div>
</div>
</div> 
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>