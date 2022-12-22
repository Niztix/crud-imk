<?php

require 'function.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "
        <script>
            alert('user baru berhasil dibuka')
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>

<body>

    <div class="rgs-contain">
        <div class="rgs-title">
            <h1>Registrasi</h1>
        </div>
        <div class="rgs-form">
            <form action="" method="POST">
                <ul>
                    <li>
                        <label for="username">Username :</label>
                        <input type="text" name="username" id="username">
                    </li>
                    <li>
                        <label for="password">Password :</label>
                        <input type="password" name="password" id="password">
                    </li>
                    <li>
                        <label for="password2">Konfirmsai Password :</label>
                        <input type="password" name="password2" id="password2">
                    </li>
                    <li>
                        <button type="submit" name="register">Daftar</button>
                    </li>
                    <input type="hidden" name="level" value="<?= $ssw["level"]; ?>">
                </ul>
            </form>
        </div>
    </div>
</body>

</html>