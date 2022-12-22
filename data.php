<?php

require 'function.php';
$siswa = query("SELECT * FROM siswa");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Administrator</a>
        </div>
    </nav>
    <div class="col py-3">
        <div class="content">
            <h1 class="page-header">Daftar Siswa</h1>
            <hr>

            <div class="table-responsive">
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
                
                <p>Total: <?php

                $result = mysqli_query($conn, "SELECT * FROM siswa");
                echo mysqli_num_rows($result);
                
                ?></p>
            </div>

        </div>
    </div>
</body>

</html>