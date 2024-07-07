<!-- Sidebar -->
<nav class="col-md-2 d-none d-md-block bg-dark sidebar fixed-top vh-100">
    <div class="sidebar-sticky d-flex flex-column justify-content-between h-100">
        <div>
            <h5 class="text-center text-light py-3">Aplikasi Pengelolaan Buku Sederhana</h5>
            <ul class="nav flex-column mt-5">
                <li class="nav-item my-2">
                    <a class="nav-link text-light" href="index.php?dashboard">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link text-light" href="tambah_buku.php">
                        Tambah Buku
                    </a>
                </li>
                <li class="nav-item my-2">
                    <a class="nav-link text-light" href="kategori.php?kategori">
                        Kelola Kategori
                    </a>
                </li>
            </ul>
        </div>
        <form action="logout.php" method="post">
            <button name="logout" style="width: 100%;margin-bottom:20px;" class="btn btn-danger">Logout</button>
        </form>
    </div>
</nav>