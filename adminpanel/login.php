<?php
session_start();
require "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
    .main{
      height: 100vh;
    }
  </style>

  <title>Document</title>
</head>
<body>
  <div class="main d-flex justify-content-center align-items-center">
    <div class="p-5 w-50">
  <form action="" method="post">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" id="username">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" >
  </div>
<div>
  <button type="submit" class="btn btn-primary" name="loginbtn">Submit</button>
  </div>
</form>
<div class="mt-3">
  <?php
    if(isset($_POST['loginbtn'])){
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);  

    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
    $countdata = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);
    
    if($countdata>0){
      if(password_verify($password, $data['password'])){// membandingkan data yang diinput password dengan yg terdaftar
        $_SESSION['username'] = $data['username'];
        $_SESSION['login'] = true;
        header("location: index.php");
      } else{
        ?>
        <div class="alert alert-warning text-center" role="alert"> Password Salah!</div>
        <?php
      }

    } else {
      ?>
      <div class="alert alert-warning text-center" role="alert"> Data tidak sesuai</div>
      <?php
    }
  }
  ?>
</div>
</div>

  </div>
  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>