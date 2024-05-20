<!DOCTYPE html>
<html>
<head>
    <title>Pangkat Dua</title>
</head>
<body>
    <h2>Hitung Pangkat Dua</h2>
    <form method="post" action="">
        Masukkan Angka: <input type="number" name="angka">
        <input type="submit" name="hitung" value="Hitung">
    </form>

    <?php
    // Fungsi untuk menghitung pangkat dua dari sebuah angka
    function pangkatDua($angka) {
        return $angka * $angka;
    }

    // Memproses input jika tombol "Hitung" diklik
    if(isset($_POST['hitung'])) {
        // Mengambil angka yang dimasukkan oleh pengguna
        $angka = $_POST['angka'];
        // Memastikan input adalah angka yang valid
        if(is_numeric($angka)) {
            // Menghitung dan menampilkan hasil pangkat dua
            echo "<h3>Hasil Pangkat Dua dari $angka adalah: " . pangkatDua($angka) . "</h3>";
        } else {
            // Jika input bukan angka, tampilkan pesan kesalahan
            echo "<h3>Masukkan angka yang valid!</h3>";
        }
    }
    ?>
</body>
</html>