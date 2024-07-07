<?php 
require "function.php";

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

if(isset($_GET['kategori'])) {
    if(isset($_SESSION['cari'])) {
        unset($_SESSION['cari']);
    }
}

$result = mysqli_query($conn, "SELECT * FROM tbl_kategori");

$totalData = mysqli_num_rows($result);
$jumlahDataPerhalaman = 10;
$jumlahHalaman = ceil($totalData / $jumlahDataPerhalaman);
$halamanAktif = isset($_GET['page']) ? $_GET['page'] : 1;

$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$kategori = get("SELECT * FROM tbl_kategori WHERE kategori LIKE '%$cari%' ORDER BY id DESC LIMIT $awalData, $jumlahDataPerhalaman");

$jumlahLink = 3;

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


$i = $awalData + 1;
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
                <?php $pageTitle = "Kelola Kategori"; include "komponen/header.php" ?>
                
                <!-- Search Bar -->
                <?php $text = "Cari Kategori..."; $arah="kategori.php"; include "komponen/searchbar.php" ?>

                <!-- Tautan untuk Tambah Kategori -->
                <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
                    <h2>Daftar Kategori</h2>
                    <a href="tambahkategori.php" class="btn btn-primary">Tambah Kategori</a>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php if($halamanAktif>1): ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif - 1 ?>">Previous</a></li>
                        <?php endif; ?>
                        <?php for($n = $awalLink; $n <= $akhirLink; $n++): ?>
                            <?php if($n == $halamanAktif): ?>
                                <li class="page-item"><a class="page-link fw-bold text-danger" href="?page=<?= $n ?>"><?= $n ?></a></li>
                            <?php else: ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $n ?>"><?= $n ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <?php if($halamanAktif<$jumlahHalaman) : ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif + 1 ?>">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>

                <!-- Tabel Kategori -->
                <?php if(count($kategori) > 0) : ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($kategori as $row) : ?>
                                    <tr>
                                        <td ><?= $i++ ?></td>
                                        <td><?= $row['kategori'] ?></td>
                                        <td>
                                            <a href="editkategori.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a onclick="return confirm('Anda yakin?') " href="hapuskategori.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <?php include "kategoritidakada.php" ?>
                <?php endif; ?>

                <!-- Pagination (Optional) -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php if($halamanAktif>1): ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $halamanAktif - 1 ?>">Previous</a></li>
                        <?php endif; ?>
                        <?php for($n = $awalLink; $n <= $akhirLink; $n++): ?>
                            <?php if($n == $halamanAktif): ?>
                                <li class="page-item"><a class="page-link fw-bold text-danger" href="?page=<?= $n ?>"><?= $n ?></a></li>
                            <?php else: ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $n ?>"><?= $n ?></a></li>
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