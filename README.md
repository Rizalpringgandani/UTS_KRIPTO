# Tranposition cpiher



### Nama    :Rizal Pringgandani
### NIM     :312110151
### Kelas   :TI.21.A2
---

### Pengenalan transposition Cipher

Hill Cipher adalah sebuah cipher blok yang mengenkripsi data menggunakan teknik aljabar linear. Dalam soal ini, Anda akan menggunakan Hill Cipher untuk mengamankan password pada sistem login aplikasi web. Cipher ini menggunakan sebuah matriks kunci untuk melakukan enkripsi dan matriks yang invers untuk dekripsi. Untuk menyederhanakan, asumsikan matriks kunci adalah matriks 2x2 dan semua operasi dilakukan dalam modulo 26.

### Input dan Persiapan:

Fungsi hill_cipher digunakan untuk melakukan enkripsi dan dekripsi teks. Teks yang akan diolah diubah menjadi huruf kapital dan spasi dihilangkan. Jika panjang teks ganjil, karakter 'X' ditambahkan untuk membuatnya menjadi panjang yang genap.

### Enkripsi:

Dalam mode "encrypt", teks dipisahkan menjadi pasangan karakter. Setiap pasangan karakter diubah menjadi vektor numerik dengan mengurangkan nilai ASCII 'A' dari karakter tersebut.
Matriks kunci digunakan untuk mengalikan masing-masing pasangan karakter, dan hasilnya diambil modulo 26 (mod 26). Hasil enkripsi adalah pasangan karakter baru.

### Dekripsi:

Dalam mode "decrypt", proses yang sama dengan enkripsi dilakukan, tetapi dengan matriks kunci invers. Matriks kunci invers diperoleh dengan menghitung determinan matriks kunci, menemukan invers modulus determinan, dan menghitung matriks adjoint.
Hasil dekripsi adalah pasangan karakter asli setelah mengalami transformasi kebalikan.

### Fungsi Tambahan:

determinant: Menghitung determinan dari matriks 2x2.
matrix_multiply: Mengalikan matriks dengan skalar.
matrix_modulo: Melakukan operasi modulo pada matriks.
matrix_inverse: Menghitung matriks invers menggunakan invers modulus determinan.

### Database

[Database](https://github.com/Rizalpringgandani/UTS_KRIPTO/blob/main/hillciper/login_enkrip.sql)


### Form Register

![alt text](gambar/regis.png)

### Form Login

![alt text](gambar/login.png)

### enkrip

![alt text](gambar/enkrip.png)

### dekrip 

![alt text](gambar/dekrip.png)
