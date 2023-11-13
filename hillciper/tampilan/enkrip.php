<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Ganti dengan nama file CSS Anda -->
</head>

<body>
    <h2>Enkripsi Password dengan Hill Cipher</h2>

    <?php
    require_once("../config.php"); // Memasukkan konfigurasi database
    require_once("../hilchiper.php"); // Memasukkan fungsi Hill Cipher Anda

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Mengecek apakah permintaan merupakan metode POST
        $username = $_POST['username']; // Mengambil data nama pengguna dari formulir
        $password = $_POST['password']; // Mengambil data kata sandi dari formulir
        $key = [[2, 1], [3, 4]]; // Menentukan matriks kunci Hill Cipher
        $encrypted_password = hill_cipher($password, $key, "encrypt"); // Mengenkripsi kata sandi

        $query = "INSERT INTO users (username, password) VALUES ('$username', '$encrypted_password')"; // Membuat perintah SQL untuk menyimpan data pengguna ke database
        mysqli_query($conn, $query); // Menjalankan perintah SQL

        // Menampilkan hasil operasi
    ?>
        <div class="result">
            <p>Password: <?php echo $password; ?></p> <!-- Menampilkan kata sandi asli -->
            <p>Key: <?php echo json_encode($key); ?></p> <!-- Menampilkan matriks kunci dalam bentuk JSON -->
            <p>Encrypted Password: <?php echo $encrypted_password; ?></p> <!-- Menampilkan kata sandi terenkripsi -->
            <div class="action-buttons">
                <a href="../registrasi.php">Register</a> <!-- Tautan ke halaman pendaftaran -->
                <a href="../index.php">Login</a> <!-- Tautan ke halaman login -->
            </div>
        </div>
    <?php
    }
?>

</body>

</html>

<?php

// require_once("../config.php");
// require_once("../hilchiper.php"); // Sertakan fungsi Hill Cipher Anda

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $key = [[2, 1], [3, 4]];
//     // Enkripsi kata sandi menggunakan Hill Cipher
//     $encrypted_password = hill_cipher($password, $key, "encrypt");

//     $query = "INSERT INTO users (username, password) VALUES ('$username', '$encrypted_password')";
//     mysqli_query($conn, $query);

//     // Alihkan ke halaman login
//     header("Location: index.php");
// }
?>