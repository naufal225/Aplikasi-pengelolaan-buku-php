<?php 
require "function.php";

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

if(deleteBook($id) > 0) {
    echo "
        <script>
            alert('Buku berhasil dihapus');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Buku gagal dihapus');
            document.location.href = 'index.php';
        </script>
    ";
}


?>