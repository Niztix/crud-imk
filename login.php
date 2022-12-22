<?php

session_start();
require 'function.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT usernam FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}


if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $cek = mysqli_num_rows($result);

    // cek username
    if( $cek > 0 ) {
        $data = mysqli_fetch_assoc($result);
        if( $data['level'] == "admin" ){
            $_SESSION['login'] = $username;
            $_SESSION['level'] = "admin";
            header("Location: index.php");
        } else if( $data['level'] == "siswa" ) {
            $_SESSION['login'] = $username;
            $_SESSION['level'] = "siswa";
            header("Location: siswa.php");
        } else {
            header("Location: index.php?pesangagal");
        }
    } else {
        header("Location: index.php?pesan=gagal");
    }
    // if (mysqli_num_rows($result) === 1) {
    //     // cek password
    //     $row = mysqli_fetch_assoc($result);
    //     if (password_verify($password, $row["password"])) {
    //         $_SESSION["login"] = true;

    //         // cek ingat saya
    //         if (isset($_POST["remember"])) {
    //             // buat cookie
    //             setcookie('ld', $row['id'], time() + 3600);
    //             setcookie('key', hash('sha256', $row['username']));
    //         }

    //         header("Location: index.php");
    //         exit;
    //     }
    // }

    $error = true;
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
    <title>Login</title>
</head>

<body>
    <div class="global-container d-flex justify-content-center align-items-center" style="height: 100%;">
        <div class="card" style="width: 30rem;">
            <div class="card-header text-white" style="background-color: black;">
                <h1 class=" card-title text-center">LOGIN</h1>
            </div>
            <div class="card-body">

                <?php if (isset($error)) : ?>
                    <p>Username atau Password Anda Salah</p>
                <?php endif; ?>

                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label for="remember" class="form-check-label">Ingat saya</label>
                    </div>
                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>