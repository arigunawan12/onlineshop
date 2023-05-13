<?php
require "session.php";
require "../koneksi.php";

$id= $_GET['p'];
$query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Kategori</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
  <?php require "navbar.php";?>
  <div class="container mt-5">
  <h2>Detail Kategori</h2>
  <div class="col-12 col-md-6">
  <form action="" method="post">
    <div>
<label for="kategori">Kategori</label>
<input type="text" name="kategori" id="kategori" value="<?php echo $data['nama'];?>" class="form-control">
</div>
<div class="mt-5 d-flex justify-content-between">
  <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
  <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
</div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </form>
  <?php 
    if(isset($_POST['editBtn'])){
      $kategori = htmlspecialchars($_POST['kategori']);

      if($data['nama']==$kategori){
        ?>
        <meta http-equiv="refresh" content="0; url=kategori.php"/>
        <?php
      } 
      else {
        $query = mysqli_query($con,"SELECT * FROM kategori WHERE nama='$kategori'");
        $jumlahData = mysqli_num_rows($query);

        if($jumlahData > 0){
          ?>
          <div class="alert alert-warning mt-3" role="alert">
          Kategori Sudah Ada
          </div>
          <?php
        } else {
          $querySimpan = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id'");
          if($querySimpan){
            ?>
            <div class="alert alert-primary mt-3" role="alert">Kategori Berhasil Diupdate</div>
            <meta http-equiv="refresh" content="2; url=kategori.php">
            <?php
          }else{
            echo mysqli_error($con);
          }
        }
      }
  }
  
  if(isset($_POST['deleteBtn'])){
    $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");
    if($queryDelete){
      ?>
      <div class="alert alert-primary mt-3" role="alert">Kategori Berhasil Dihapus</div>
      <meta http-equiv="refresh" content="2; url=kategori.php"/>
      <?php
    } else{
      echo mysqli_error($con);
    }
  }
?>
  
  </div>
</body>
</html>