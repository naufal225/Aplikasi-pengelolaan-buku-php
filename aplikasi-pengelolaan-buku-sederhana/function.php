<?php 


$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_buku"
);

function get($query) {
    global $conn;
    $results = [];
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result)) {
        $results[] = $row;
    }
    return $results;
};

function dbCUD($query) {
    global $conn;
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function registrasi($data) {
    global $conn;
    $username = strtolower(htmlspecialchars(stripslashes($data["username"])));
    $password = mysqli_real_escape_string($conn,stripslashes($data["password"]));
    $konfirmasi = mysqli_real_escape_string($conn,stripslashes($data["konfirmasi"]));

    if($password != $konfirmasi) {
        echo "
            <script>
                alert('Konfirmasi Password Salah');
            </script>
        ";
        return false;
    }

    $query = "SELECT * FROM tbl_user";

    $result = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($result)) {
        if($row["username"] == $username) {
            echo "
                <script>
                    alert('Username tidak tersedia')
                </script>
            ";
            return false;
        }
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO tbl_user (username,password) values('$username', '$password')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}

function addBook($data) {
    global $conn;
    $judul = htmlspecialchars($data['judul_buku']);
    $penulis = htmlspecialchars($data['penulis']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
    $tentang = htmlspecialchars($data['tentang']);
    $id_kategori = htmlspecialchars($data['id_kategori']);

    $gambar = upload($_FILES['gambar']);

    if(!$gambar) {
        return false;
    }

    $query = "INSERT INTO tbl_buku (judul_buku,gambar,id_kategori,penerbit,penulis,tahun_terbit,tentang) VALUES('$judul','$gambar','$id_kategori','$penerbit','$penulis','$tahun_terbit','$tentang')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}


function editBook($data) {
    global $conn;

    $id = $data['id'];
    $judul = htmlspecialchars($data['judul_buku']);
    $penulis = htmlspecialchars($data['penulis']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
    $tentang = htmlspecialchars($data['tentang']);
    $id_kategori = htmlspecialchars($data['id_kategori']);


    if($_FILES['gambar']['error'] == 4) {
        $gambar = $_POST['namagambarlama'];
    } else {
        $gambar = upload($_FILES['gambar']);
    }

    $query = "UPDATE tbl_buku SET judul_buku='$judul', gambar='$gambar', id_kategori='$id_kategori', penerbit='$penerbit', penulis='$penulis', tahun_terbit='$tahun_terbit', tentang='$tentang' WHERE id= $id";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}


function upload($data) {
    $nama = $data['name'];
    $ukuran = $data['size'];
    $tmp_name = $data['tmp_name'];
    $error = $data['error'];

    if($error == 4) {
        echo "
            <script>
                alert('Masukan gambar');
            </script>
        ";
        return false;
    }

    $ekstensiValid = ['jpg', 'jpeg', 'webp', 'png'];
    $ekstensi = (explode('.', $nama));
    $ekstensi = strtolower(end($ekstensi));

    if(!in_array($ekstensi, $ekstensiValid)) {
        echo "
            <script>
                alert('Ekstensi Tidak Valid');
            </script>
        ";
        return false;
    }

    if($ukuran > 1200000) {
        echo "
            <script>
                alert('Gambar terlalu besar');
            </script>
        ";
        return false;
    }

    $namaBaru = uniqid() . "." . $ekstensi;

    move_uploaded_file($tmp_name, 'img/'.$namaBaru);

    return $namaBaru;

}

function deleteBook($id) {
    global $conn;
    dbCUD("DELETE FROM tbl_buku WHERE id = $id");
    return mysqli_affected_rows($conn);
}


?>
