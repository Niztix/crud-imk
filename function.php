<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_sekolah");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nis = htmlspecialchars($data["nis"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);

    // query insert data
    $query = "INSERT INTO siswa VALUES ('','$nis','$nama','$jenis_kelamin','$jurusan','$email')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nis = htmlspecialchars($data["nis"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);

    // query insert data
    $query = "UPDATE siswa SET nis = '$nis', nama = '$nama', jenis_kelamin = '$jenis_kelamin', jurusan = '$jurusan', email = '$email' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM siswa WHERE nama LIKE '%$keyword%'";
    return query($query);
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username yang dipilih sudah dipakai');
            </script>";

        return false;
    }
    // cek kofirmasi password
    if( $password !== $password2 ) {
        echo "<script>
                alert('kofirmasi password tidak sesuai');
            </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);

}

?>