<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'function.php';
$siswa = query("SELECT * FROM siswa");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <hr>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Jurusan</th>
            <th>Email</th>
        </tr>';

        $i = 1;
        foreach ($siswa as $row) {
            $html .= '<tr>
                <td>'. $i++ . '</td>
                <td>'. $row["nis"] . '</td>
                <td>'. $row["nama"] . '</td>
                <td>'. $row["jenis_kelamin"] . '</td>
                <td>'. $row["jurusan"] . '</td>
                <td>' . $row["email"] . '</td>
            </tr>';
        }

$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa', \Mpdf\Output\Destination::INLINE);

?>

