<?php 
require "function.php";

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$query = "SELECT * FROM tbl_buku INNER JOIN tbl_kategori ON tbl_buku.id_kategori = tbl_kategori.id WHERE tbl_buku.id = '$id'";
$result = mysqli_query($conn, $query);

$buku = mysqli_fetch_assoc($result);
$kategoriBuku = $buku["kategori"];

$kategori = get("SELECT * FROM tbl_kategori");


if(empty($buku)) {
    header("Location: index.php");
    exit;
}


if(isset($_POST["submit"])) {
    if(editBook($_POST) > 0) {
        echo "
            <script>
                alert('Data Buku Berhasil Diubah');
            </script>
        ";
        header("Location: index.php");
        exit;
    } else {
        echo "
            <script>
                alert('Data Buku Gagal Diubah');
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
    <title>Tambah Buku</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php include "komponen/sidebar.php"; ?>

            <!-- Konten Utama -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <?php $pageTitle = "Tambah Buku"; include "komponen/header.php"; ?>

                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value="<?= $buku['id'] ?>">
                                                    <label for="judul_buku">Judul Buku</label>
                                                    <input type="text" class="form-control" id="judul_buku" name="judul_buku" required value="<?= $buku['judul_buku'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="penulis">Penulis</label>
                                                    <input type="text" class="form-control" id="penulis" name="penulis" required value="<?= $buku['penulis'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="penerbit">Penerbit</label>
                                                    <input type="text" class="form-control" id="penerbit" name="penerbit" required value="<?= $buku['penerbit'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tahun_terbit">Tahun Terbit</label>
                                                    <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" min="0" max="2100" step="1" required value="<?= $buku['tahun_terbit'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sinopsis">Sinopsis/Tentang</label>
                                                    <textarea class="form-control" id="sinopsis" name="tentang" rows="5" required><?= $buku['tentang'] ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kategori">Kategori</label>
                                                    <select class="form-control" id="kategori" name="id_kategori" required>
                                                        <?php foreach($kategori as $row): ?>
                                                            <option value="<?= $row['id'] ?>" <?= $row['id'] == $buku['id_kategori'] ? "selected" : '' ?>><?= $row['kategori'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gambar">Gambar</label>
                                                    <div class="img">
                                                        <img src="img/<?= $buku['gambar'] ?>" style="width:80px;" alt="">
                                                    </div>
                                                    <input type="hidden" name="namagambarlama" value="<?= $buku['gambar'] ?>">
                                                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success btn-block">Edit Buku</button>
                                    </form>
                                </div>
                            </div>
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
