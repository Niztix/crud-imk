<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        header('Location: index.php');
    } else {
        die("gagal ditambah...");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Data Siswa</title>
</head>

<body>
    <div class="global-container d-flex justify-content-center align-items-center" style="height: 100%;">
        <div class="card" style="width: 50rem;">
            <div class="card-header text-white" style="background-color: black;">
                <h1 class="card-title text-center">Tambah Data Siswa</h1>
            </div>

            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="nis">NIS : </label>
                        <input class="form-control" type="text" name="nis" id="nis" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama : </label>
                        <input class="form-control" type="text" name="nama" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="jenis_kelamin">Jenis Kelamin : </label>
                        <div class="form-check">
                            <label><input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" required>Laki-Laki</label>
                        </div>
                        <div class="form-check">
                            <label><input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan" required>Perempuan</label>
                        </div>
                    </div>
                    <div>
                        <label class="form-label" for="jurusan">Jurusan : </label>
                        <select class="form-select form-select-md mb-3" name="jurusan" id="jurusan" required>
                            <option>RPL</option>
                            <option>TKJ</option>
                            <option>Bisnis</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email : </label>
                        <input class="form-control" type="text" name="email" id="email" required>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Tambah</button>
                    <a class="btn btn-danger" href="index.php">Kembali</a>
                </form>
            </div>

        </div>
    </div>


</body>

</html>