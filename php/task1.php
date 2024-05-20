<!DOCTYPE html>
<html>
<head>
    <title>Sistem Kasir</title>
</head>
<body>
    <h2>Hitung Total Belanja</h2>
    <form method="post" action="">
        Masukkan total belanja (Rp): <input type="number" name="total_belanja" required><br><br>
        <input type="submit" value="Hitung">
    </form>

    <?php
    // Periksa apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai total belanja dari form
        $totalBelanja = $_POST['total_belanja'];

        // Fungsi untuk menghitung total yang harus dibayar
        function hitungTotalBayar($totalBelanja) {
            if ($totalBelanja < 1000000) {
                return $totalBelanja;
            } elseif ($totalBelanja >= 1000000 && $totalBelanja < 2000000) {
                return $totalBelanja * 0.975; // Diskon 2.5%
            } else {
                return $totalBelanja * 0.95; // Diskon 5%
            }
        }

        // Hitung total yang harus dibayar
        $totalBayar = hitungTotalBayar($totalBelanja);

        // Tampilkan hasil
        echo "<h3>Hasil:</h3>";
        echo "Total belanja: Rp. " . number_format($totalBelanja, 0, ',', '.') . "<br>";
        echo "Total yang harus dibayarkan: Rp. " . number_format($totalBayar, 0, ',', '.');
    }
    ?>
</body>
</html>
