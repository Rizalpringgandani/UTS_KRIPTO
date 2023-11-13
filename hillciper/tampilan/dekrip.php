<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Ganti dengan nama file CSS Anda -->
</head>
<body>
<?php
    require_once("../config.php"); // Memasukkan file konfigurasi
    require_once("../hilchiper.php"); // Sertakan fungsi Hill Cipher Anda

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Cek jika request adalah metode POST
        $username = $_POST['username']; // Ambil nilai dari input 'username'
        $password = $_POST['password']; // Ambil nilai dari input 'password'
        $query = "SELECT * FROM users WHERE username = '$username'"; // Membuat query SQL
        $result = mysqli_query($conn, $query); // Menjalankan query SQL dan menyimpan hasilnya dalam variabel $result

        if ($result) { // Jika query berhasil dijalankan
            $user = mysqli_fetch_assoc($result); // Mengambil data pengguna sebagai array asosiatif
            $stored_encrypted_password = $user['password']; // Mengambil password terenkripsi yang disimpan dalam database
            $key = [[2, 1], [3, 4]]; // Mendefinisikan matriks kunci Hill Cipher

            // Dekripsi kata sandi yang tersimpan menggunakan Hill Cipher
            $decrypted_password = hill_cipher($stored_encrypted_password, $key, "decrypt");

            $hasil = strtolower($decrypted_password); // Mengonversi kata sandi yang terdekripsi ke huruf kecil

            if ($password == $hasil) { // Memeriksa apakah kata sandi yang dimasukkan sama dengan yang terdekripsi
    ?>
                <div class="result">
                    <h2>Dekripsi Password dengan Hill Cipher</h2>
                    <p>Password: <?php echo $stored_encrypted_password; ?></p>
                    <p>Key: <?php echo json_encode($key); ?></p>
                    <p>Decrypted Password: <?php echo $decrypted_password; ?></p>
                    <div class="action-buttons">
                        <a href="../registrasi.php">Register</a> <!-- Tautan ke halaman pendaftaran -->
                        <a href="../index.php">Login</a> <!-- Tautan ke halaman login -->
                    </div>
                </div>
    <?php
            } else {
                echo "Login gagal"; // Jika kata sandi tidak cocok
            }
        } else {
            echo "Login gagal. Pengguna tidak ditemukan."; // Jika pengguna tidak ditemukan dalam database
        }
    }
?>

   

</body>

</html>