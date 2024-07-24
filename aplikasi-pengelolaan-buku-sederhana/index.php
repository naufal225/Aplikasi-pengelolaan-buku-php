<?php 
require 'function.php';
session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

if(isset($_POST['btncari'])) {
    if(isset($_POST['cari'])) {
        $cari = $_POST['cari'];
        $_SESSION['cari'] = $cari;
    }
} else {
    if(isset($_POST['cari'])) {
        $cari = $_SESSION['cari'];
    } else {
        $cari = '';
    }
}

if(isset($_GET['dashboard'])) {
    if(isset($_SESSION['cari'])) {
        unset($_SESSION['cari']);
    }
}

$queryy = "SELECT * FROM tbl_buku WHERE judul_buku LIKE '%$cari%' OR penulis LIKE '%$cari%' OR penerbit LIKE '%$cari%'";

$jumlahDataPerhalaman = 12;
$jumlahData = mysqli_num_rows(mysqli_query($conn, $queryy));
$jumlahHalaman = ceil($jumlahData/$jumlahDataPerhalaman);
$halamanAktif = isset($_GET['page']) ? $_GET['page'] : 1;

// 1 = 0 - 11
// 2 = 12 - 23
// 3 = 24 - 35
// 4 = 36 - 47
// 5 = 48 - 59
// 6 = 60 - 71

$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$jumlahLink = 2;

if($halamanAktif > $jumlahLink) {
    $awalLink = $halamanAktif - $jumlahLink;
} else {
    $awalLink = 1;
}

if($halamanAktif < $jumlahHalaman - $jumlahLink) {
    $akhirLink = $halamanAktif + $jumlahLink;
} else {
    $akhirLink = $jumlahHalaman;
}



$buku = get("SELECT * FROM tbl_buku WHERE judul_buku LIKE '%$cari%' OR penulis LIKE '%$cari%' OR penerbit LIKE '%$cari%' ORDER BY id DESC LIMIT $awalData, $jumlahDataPerhalaman");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pengelolaan Buku Sederhana</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php include "komponen/sidebar.php" ?>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <?php $pageTitle = "Dashboard"; include "komponen/header.php" ?>
                
                <!-- Search Bar -->
                <?php $text = "Cari Buku..."; $arah = "index.php"; include "komponen/searchbar.php" ?>

                <!-- Pagination (Optional) -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php if($halamanAktif>1): ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif - 1 ?>">Previous</a></li>
                        <?php endif; ?>
                        <?php for($i = $awalLink; $i <= $akhirLink; $i++): ?>
                            <?php if($i == $halamanAktif): ?>
                                <li class="page-item"><a class="page-link fw-bold text-danger" href="?page=<?= $i ?>"><?= $i ?></a></li>
                            <?php else: ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <?php if($halamanAktif<$jumlahHalaman) : ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif + 1 ?>">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>

                <!-- Book Cards -->
                <?php if(count($buku) > 0): ?>
                    <div class="row">
                        <?php foreach($buku as $row): ?>
                            <!-- Example Book Card -->
                            <div class="col-md-3">
                                <div class="card mb-4 shadow-sm">
                                    <img src="img/<?= $row['gambar'] ?>" class="card-img-top" alt="Gambar Buku">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $row['judul_buku'] ?></h5>
                                        <h6><?= $row['penulis'] ?></h6>
                                        <button type="button" class="btn btn-primary" data-id="<?= $row['id'] ?>" data-toggle="modal" data-target="#bookDetailModal<?= $row['id'] ?>">
                                            Detail
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Duplicate the book card as necessary, up to 12 cards per page -->

                            <!-- Modal for Book Details -->
                            <div class="modal fade" id="bookDetailModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="bookDetailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="bookDetailModalLabel">Detail Buku</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="img/<?= $row['gambar'] ?>" class="img-fluid mb-3" alt="Gambar Buku">
                                                </div>
                                                <div class="col-md-8">
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <p><strong>Nama Buku:</strong> <?= $row['judul_buku'] ?></p>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <p><strong>Tahun Terbit:</strong> <?= $row['tahun_terbit'] ?></p>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <p><strong>Penerbit:</strong> <?= $row['penerbit'] ?></p>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <p><strong>Penulis:</strong> <?= $row['penulis'] ?></p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="list-group-item">
                                                        <p><strong>Tentang:</strong></p>
                                                        <p><?= $row['tentang'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <a type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</a>
                                            <a id="btn-edit" type="button" class="btn btn-warning" href="edit_buku.php?id=<?= $row['id'] ?>">Edit Buku</a>
                                            <a onclick="return confirm('Anda yakin?')" id="btn-delete" type="button" class="btn btn-danger" href="hapusbuku.php?id=<?= $row['id'] ?>">Hapus Buku</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                <?php else: include "bukutidakada.php" ?>
                <?php endif; ?>

                <!-- Pagination (Optional) -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php if($halamanAktif>1): ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif - 1 ?>">Previous</a></li>
                        <?php endif; ?>
                        <?php for($i = $awalLink; $i <= $akhirLink; $i++): ?>
                            <?php if($i == $halamanAktif): ?>
                                <li class="page-item"><a class="page-link fw-bold text-danger" href="?page=<?= $i ?>"><?= $i ?></a></li>
                            <?php else: ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <?php if($halamanAktif<$jumlahHalaman) : ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif + 1 ?>">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
