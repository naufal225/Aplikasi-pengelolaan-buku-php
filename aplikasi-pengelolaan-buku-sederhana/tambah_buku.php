<?php 
require "function.php";

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

$kategori = get("SELECT * FROM tbl_kategori");

if(isset($_POST["submit"])) {
    if(addBook($_POST) > 0) {
        echo "
            <script>
                alert('Data Buku Berhasil Ditambahkan');
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Buku Gagal Ditambahkan');
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
                                                    <label for="judul_buku">Judul Buku</label>
                                                    <input type="text" class="form-control" id="judul_buku" name="judul_buku" required autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="penulis">Penulis</label>
                                                    <input type="text" class="form-control" id="penulis" name="penulis" required autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="penerbit">Penerbit</label>
                                                    <input type="text" class="form-control" id="penerbit" name="penerbit" required autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tahun_terbit">Tahun Terbit</label>
                                                    <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" min="0" max="2100" step="1" required autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sinopsis">Sinopsis/Tentang</label>
                                                    <textarea class="form-control" id="sinopsis" name="tentang" rows="5" required autocomplete="off"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kategori">Kategori</label>
                                                    <select class="form-control" id="kategori" name="id_kategori" required autocomplete="off">
                                                        <?php foreach($kategori as $row): ?>
                                                            <option value="<?= $row['id'] ?>"><?= $row['kategori'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gambar">Gambar</label>
                                                    <input type="file" class="form-control-file" id="gambar" name="gambar" required autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success btn-block">Tambah Buku</button>
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
