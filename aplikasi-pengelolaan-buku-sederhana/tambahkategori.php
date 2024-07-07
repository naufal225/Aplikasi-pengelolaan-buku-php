<?php 
require "function.php";

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

if(isset($_POST["submit"])) {
    $kategori = $_POST['nama_kategori'];
    $result = mysqli_query($conn,"SELECT * FROM tbl_kategori WHERE kategori = '$kategori'");
    if(mysqli_num_rows($result) > 0) {
        echo "
            <script>
                alert('Kategori sudah ada');
            </script>
        ";
        return false;
    }

    if(dbCUD("INSERT INTO tbl_kategori (kategori) values('$kategori')")) {
        echo "
            <script>
                alert('Berhasil');
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php include "komponen/sidebar.php"; ?>

            <!-- Konten Utama -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <?php $pageTitle = "Tambah Kategori"; include "komponen/header.php"; ?>

                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-header bg-primary text-white text-center">
                                    Tambah Kategori
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="nama_kategori">Nama Kategori</label>
                                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success btn-block">Tambah</button>
                                    </form>
                                </div>
                            </div>
                            <a href="kategori.php" class="btn btn-danger mt-5" style="width:100%;">Kembali</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
