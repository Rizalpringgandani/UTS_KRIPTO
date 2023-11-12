    <?php

require_once("config.php"); // Mengimpor file konfigurasi yang berisi koneksi ke database.
require_once("function/matrik_posisi.php"); // Mengimpor file yang mungkin berisi definisi fungsi atau variabel terkait matriks posisi.
require_once("function/transpose_karakter.php"); // Mengimpor file yang mungkin berisi definisi fungsi atau variabel terkait transposisi karakter.

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Memeriksa apakah permintaan HTTP adalah metode POST (dalam konteks registrasi).
    $username = $_POST["username_reg"]; // Mengambil nilai username dari data POST.
    $password = $_POST["password_reg"]; // Mengambil nilai password dari data POST.
    $key = "312"; // Kunci yang mungkin digunakan untuk enkripsi.

    // Encrypt the password before storing it in the database
    $encryptedPassword1 = encryptTransposition($password, 3); // Mengenkripsi kata sandi dengan metode transposisi.
    $encryptedPassword2 = transposeEncrypt($encryptedPassword1, $key); // Melakukan operasi transposisi pada kata sandi terenkripsi.

    // Insert user data into the database
    $sql = "INSERT INTO pengguna (username, password) VALUES (?, ?)"; // Kueri SQL untuk memasukkan data pengguna ke dalam tabel pengguna.
    $stmt = $conn->prepare($sql); // Persiapkan kueri untuk dieksekusi.
    $stmt->execute([$username, $encryptedPassword2]); // Eksekusi kueri dengan nilai username dan kata sandi terenkripsi.

    // echo "<a href=>login</a>" ;// Pesan sukses jika registrasi berhasil maka akan langsung di arahkan ke menu login

    header('Location: index.php');

$conn = null; // Menutup koneksi database setelah selesai menggunakannya.
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        

        <h2>Registration</h2>
        <form action="" method="post">
            <label for="username_reg">Username:</label>
            <input type="text" name="username_reg" required>
            <br>
            <label for="password_reg">Password:</label>
            <input type="password" name="password_reg" required>
            <br>
            <button type="submit">Register</button>
            <p ><a href="index.php">login</a></p>
        </form>
    </div>
</body>
</html>