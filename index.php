<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';
$siswa = query("SELECT * FROM siswa");

// tombol cari ditekan 
if (isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Halaman Admin</title>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="login.php">Administrator</a>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #f2f2f2;">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item"><a href="" class="nav-link align-middle px-0"><i class="bi bi-house-door-fill"></i> <span>Home</span></a></li>
                        <li>
                            <a href="cetak.php" target="_blank" class="nav-link px-0 align-middle"><i class="bi bi-printer-fill"></i> <span>Cetak Data</span></a>
                        </li>
                        <li>
                            <a href="data.php" class="nav-link px-0 align-middle"><i class="bi bi-file-earmark-fill"></i> <span>Semua Data</span></a>
                        </li>
                        <li>
                            <a href="logout.php" class="nav-link px-0 align-middle"><i class="bi bi-door-open-fill"></i> <span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col py-3">
                <div class="content">
                    <h1 class="page-header">Daftar Siswa</h1>
                    <hr>

                    <div class="table-responsive">
                        <nav class="py-3">
                            <a class="btn btn-primary" href="tambah.php"><span><i class="bi bi-plus"></i> Tambah Data</span></a>
                        </nav>

                        <form class="pb-3" action="" method="POST">
                            <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
                            <button class="btn btn-secondary btn-sm" type="submit" name="cari">Cari</button>
                        </form>

                        <table class="table table-striped">

                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Jurusan</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>

                            <?php $i = 1; ?>
                            <?php foreach ($siswa as $row) : ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row["nis"]; ?></td>
                                    <td><?= $row["nama"]; ?></td>
                                    <td><?= $row["jenis_kelamin"]; ?></td>
                                    <td><?= $row["jurusan"]; ?></td>
                                    <td><?= $row["email"]; ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="ubah.php?id=<?= $row["id"]; ?>"><i class="bi bi-pencil-square"></i> <span>Ubah</span></a>
                                        <a class="btn btn-danger btn-sm" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('ingin menghapus data?');"><i class="bi bi-trash3"></i> <span>Hapus</span></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>