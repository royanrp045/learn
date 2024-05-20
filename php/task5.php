<!DOCTYPE html>
<html>
<head>
    <title>Chess Board</title>
    <style>
        td {
            width: 50px;
            height: 50px;
            text-align: center;
            border: 1px solid black;
        }
        .yellow {
            background-color: yellow;
        }
        .red {
            background-color: red;
        }
    </style>
</head>
<body>
    <table>
        <?php
        $size = 8;
        for ($row = 1; $row <= $size; $row++) {
            echo "<tr>";
            for ($col = 1; $col <= $size; $col++) {
                // Jika baris lebih dari atau sama dengan jumlah kolom dikurangi dari ukuran papan catur,
                // maka kotak akan berwarna kuning
                // Jika tidak, maka kotak akan berwarna merah
                if ($row >= $size - $col + 1) {
                    echo "<td class='yellow'></td>";
                } else {
                    echo "<td class='red'></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>