<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

$id = $_GET["id"];

if( hapus($id) > 0 ){
    header('Location: index.php');
} else {
    die("gagal dihapus...");
}

?>