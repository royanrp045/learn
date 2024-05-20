<!DOCTYPE html>
<html>
<head>
    <title>Pengantar PHP</title>
    <script type="text/javascript">
        function myfunction() {
            alert("Halo Mahasiswa! Selamat belajar!");
        }
    </script>
</head>
<body style='background-color:#87e7fa; '>
<?php
    echo "<h2>Hello World!</h2>";
?>
<hr>
<?php
    $nama = "Rizal";
    $prodi = "D3 Teknologi Informasi";
    $kelas = "TI-1A";
    echo "Nama Mahasiswa: ".$nama."<br>";
    echo "Prodi: ".$prodi."<br>";
    echo "Kelas : ".$kelas;
    echo "<p>";
?>
<hr>
<?php
    echo "<h2>Menghitung Luas Persegi Panjang</h2>";
    $panjang = 10;
    $lebar = 30;
    $luas = $panjang * $lebar;
    echo "Nilai panjang = ".$panjang. " & Nilai lebar = ".$lebar. "<br>";
    echo "Luas Persegi Panjang (p*l) = ".$luas;
?>
<hr>
<h2>Contoh Javascript pada PHP</h2>
<form>
    <input type="button" onclick="myfunction()" value="Klik aku dong !!">
</form>
<hr>
<?php
    echo "<h2>Contoh Program <font color='blue'>IF ELSE</font> pada PHP</h2>";
    $angka1 = 50;
    $angka2 = 10;
    if ($angka1 < $angka2) {
        echo "$angka1 lebih kecil dari $angka2";
    } else {
        echo "$angka1 lebih besar dari $angka2";
    }
    echo "<hr>";
    echo "<h2>Contoh Program <font color='red'>IF ELSEIF</font> pada PHP</h2>";
    $day = 1;
    echo "angka hari", $day, "<br>";
    if ($day == 0) {
        echo "Hari Libur";
    } elseif ($day == 1) {
        echo "Hari Senin";
    } elseif ($day == 2) {
        echo "Hari Selasa";
    } elseif ($day == 3) {
        echo "Hari Rabu";
    } elseif ($day == 4) {
        echo "Hari Kamis";
    } elseif ($day == 5) {
        echo "Hari Jumat";
    } else {
        echo "masukan angka hari yang benar!";
    }
    echo "<hr>";
    echo "<h2>Contoh Program <font color='#ee7f2'>Switch Case</font> pada PHP</h2>";
    $nilai = 80;
    echo "Nilai anda", $nilai,"<p>";
    switch ($nilai) {
        case ($nilai >= 65 && $nilai <= 100):
            echo "kategori nilai excelent";
            break;
        case ($nilai >= 55 && $nilai <= 64):
            echo "kategori nilai Bagus";
            break;
        case ($nilai >= 45 && $nilai <= 54):
            echo "kategori nilai Lumayan";
            break;
        case ($nilai >= 0 && $nilai <= 44):
            echo "kategori nilai Kurang Baik";
            break;
        default:
            echo "Masukkan nilai dengan benar";
    }
?>
</body>
</html>
