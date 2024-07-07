<?php 
require 'function.php';

session_start();

if(!isset($_SESSION['login'])) {
    header('Location:login.php');
    exit;
}

if(isset($_POST['submit'])) {
    if(registrasi($_POST) > 0) {
        echo'
            <script>
                alert("Registrasi berhasil, silahkan login");
                document.location.href = "login.php";
            </script>
        ';
    } else {
        echo'
            <script>
                alert("Registrasi gagal");
            </script>
        ';
    }
}



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container d-flex justify-content-center mt-5" >
        <div class="card mt-5" style="width: 19rem;">
            <div class="card-body">
                <h2 class="text-center mt-5">Registrasi</h2>
                <?php if(isset($error)) : ?>
                    <p class="font-italic text-danger">Username atau Password salah</p>
                <?php endif; ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="konfirmasi">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Registrasi</button>
                    <button type="reset" class="btn btn-secondary mt-3">Reset</button>
                    <p>Sudah punya akun? <a href="login.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>