<?php 
require "function.php";

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}


if(isset($_GET["id"])) {
    $id = htmlspecialchars(($_GET["id"]));
    if(dbCUD("DELETE FROM tbl_kategori where id = '$id'") > 0) {
        echo "
            <script>
                alert('Kategori berhasil dihapus');
                document.location.href = 'kategori.php';
            </script>
        ";
    }
}

?>