<?php
$databaseHost = "localhost"; // Ganti dengan host database Anda
$databaseUser = "root"; // Ganti dengan username database Anda
$databasePassword = ""; // Ganti dengan password database Anda
$databaseName = "login_enkrip"; // Ganti dengan nama database Anda

$conn = mysqli_connect($databaseHost, $databaseUser, $databasePassword, $databaseName);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
