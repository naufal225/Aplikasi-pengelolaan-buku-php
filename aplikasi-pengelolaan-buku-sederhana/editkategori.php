<?php 
require "function.php";

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}


$id = $_GET['id'];
$kategori = get("SELECT * FROM tbl_kategori WHERE id = '$id'");

if(isset($_POST['submit'])) {
    $newKategori = $_POST['nama_kategori'];
    if(dbCUD("UPDATE tbl_kategori SET kategori = '$newKategori' WHERE id = '$id'")) {
        echo "
            <script>
                alert('Kategori berhasil diubah');
                document.location.href = 'kategori.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal mengubah kategori');
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
                                    Edit Kategori
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="nama_kategori">Nama Kategori</label>
                                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $kategori[0]['kategori'] ?>" required>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success btn-block">Edit</button>
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
