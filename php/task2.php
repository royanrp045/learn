<!DOCTYPE html>
<html>
<head>
    <title>Program PHP</title>
</head>
<body>
    <h2>Masukkan Nilai a, b, dan c</h2>
    <form method="post" action="">
        Masukkan nilai a: <input type="number" name="a" required><br><br>
        Masukkan nilai b: <input type="number" name="b" required><br><br>
        Masukkan nilai c: <input type="number" name="c" required><br><br>
        <input type="submit" value="Hitung">
    </form>

    <?php
    // Periksa apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai a, b, dan c dari form
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];

        // Pengecekan a > b
        if ($a > $b) {
            // Hitung d = a * b + c
            $d = $a * $b + $c;
            echo "Karena a lebih besar dari b, maka dilakukan perhitungan: d = a * b + c<br>";
            echo "d = $a * $b + $c<br>";
            echo "d = $d";
        } else {
            // Pengecekan a > c
            if ($a > $c) {
                // Hitung d = a * c + b
                $d = $a * $c + $b;
                echo "Karena a tidak lebih besar dari b, tetapi lebih besar dari c, maka dilakukan perhitungan: d = a * c + b<br>";
                echo "d = $a * $c + $b<br>";
                echo "d = $d";
            } else {
                // Hitung d = a * c - b
                $d = $a * $c - $b;
                echo "Karena a tidak lebih besar dari b dan c, maka dilakukan perhitungan: d = a * c - b<br>";
                echo "d = $a * $c - $b<br>";
                echo "d = $d";
            }
        }
    }
    ?>
</body>
</html>
