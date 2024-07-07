<?php 
require 'function.php';

session_start();

if(isset($_COOKIE['qrty'])) {
    $id = $_COOKIE['id'];
    $result = mysqli_query($conn,"SELECT * from tbl_user where id = $id");
    $row = mysqli_fetch_array($result);
    if(hash("sha256",$row["username"]) == $_COOKIE['qrty']) {
        $_SESSION['login'] = true;
        header(
            'Location:index.php'
        );
        exit();
    }
}


if(isset($_POST["submit"])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$username'");

    if($row = mysqli_fetch_assoc($result)) {
        if(password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            if(isset($_POST['rememberMe'])){
                setcookie(
                    'id',
                    $row['id'],
                    time() + (7*24*60*60),
                );
                setcookie(
                    "qrty",
                    hash('sha256', $row['username']),
                    time() + (7*24*60*60),
                );
            }
            header('Location:index.php');
            exit();
        }
    }
    $error = true;
}




?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container d-flex justify-content-center mt-5" >
        <div class="card mt-5" style="width: 19rem;">
            <div class="card-body">
                <h2 class="text-center mt-5">Login</h2>
                <?php if(isset($error)) : ?>
                    <p class="font-italic text-danger">Username atau Password salah</p>
                <?php endif; ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Login</button>
                    <button type="reset" class="btn btn-secondary mt-3">Reset</button>
                    <p>Belum punya akun? <a href="registrasi.php">Registrasi</a></p>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>