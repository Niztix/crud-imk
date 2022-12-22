<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

// ambil data URL
$id = $_GET["id"];

// query data mahasiswa berdasrkan id
$ssw = query("SELECT * FROM siswa WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        header('Location: index.php');
    } else {
        header('Location: index.php');
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
    <title>Edit Data Siswa</title>
</head>

<body>
    <div class="global-container d-flex justify-content-center align-items-center" style="height: 100%;">
        <div class="card" style="width: 50rem;">
            <div class="card-header text-white" style="background-color: black;">
                <h1 class="text-center">Ubah Data Siswa</h1>
            </div>

            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $ssw["id"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="nis">NIS : </label>
                        <input class="form-control" type="text" name="nis" id="nis" required value="<?= $ssw["nis"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama : </label>
                        <input class="form-control" type="text" name="nama" id="nama" required value="<?= $ssw["nama"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="jenis_kelamin">Jenis Kelamin : </label>
                        <?php $jk = $ssw['jenis_kelamin']; ?>
                        <div class="form-check">
                            <label><input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?> required>Laki-Laki</label>
                        </div>
                        <div class="form-check">
                            <label><input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?> required>Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="jurusan">Jurusan : </label>
                        <?php $jurusan = $ssw['jurusan']; ?>
                        <select class="form-select form-select-md mb-3" name="jurusan" id="jurusan" required>
                            <option <?php echo ($jurusan == 'RPL') ? "selected" : "" ?>>RPL</option>
                            <option <?php echo ($jurusan == 'TKJ') ? "selected" : "" ?>>TKJ</option>
                            <option <?php echo ($jurusan == 'Bisnis') ? "selected" : "" ?>>Bisnis</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email : </label>
                        <input class="form-control" type="text" name="email" id="email" required value="<?= $ssw['email']; ?>">
                    </div>


                    <button class="btn btn-primary" type=" submit" name="submit">Ubah</button>
                    <a class="btn btn-danger" href="index.php">Kembali</a>
                </form>
            </div>

        </div>
    </div>


</body>

</html>