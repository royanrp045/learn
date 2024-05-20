<!DOCTYPE html>
<html>
<head>
    <title>Papan Catur</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            width: 50px;
            height: 50px;
            border: 1px solid black;
            text-align: center;
        }

        .red {
            background-color: red;
        }

        .blue {
            background-color: blue;
        }

        .white {
            background-color: white;
        }
    </style>
</head>
<body>
    <h2>Papan Catur</h2>
    <table>
        <?php
        // Loop through each row
        for ($row = 1; $row <= 7; $row++) {
            echo "<tr>";
            // Loop through each column
            for ($col = 1; $col <= 7; $col++) {
                // Check if current cell should be red
                if (($row == 1 && $col == 4) || // Baris 1, kolom ganjil
                    ($row == 2 && ($col == 3 || $col == 5)) || // Baris 2, kolom 3 dan 5
                    ($row == 3 && ($col == 2 || $col == 4 || $col == 6)) || // Baris 3, kolom 2, 4, 6
                    ($row == 5 && ($col == 2 || $col == 4 || $col == 6)) || // Baris 5, kolom 2, 4, 6
                    ($row == 6 && ($col == 3 || $col == 5)) || // Baris 6, kolom 3, 5
                    ($row == 7 && $col == 4)) { // Baris 7, kolom 4
                    echo "<td class='red'></td>";
                } elseif (($row == 4 && $col % 2 == 1) || // Baris 4, kolom ganjil
                          ($row == 5 && $col % 2 == 0)) { // Baris 5, kolom genap
                    echo "<td class='blue'></td>";
                } else {
                    echo "<td class='white'></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
