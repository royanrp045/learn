<html>
<head>
<title>Belajar Perulangan</title>
</head>
<body bgcolor="#a0eefa">
<?php
echo "<h4>Contoh Perulangan FOR</h4><p>";
for ($i=0; $i<5; $i++) {
    echo "Ini perulangan ke-$i <br>";
}
echo "<hr>";
echo "<h4>Contoh Perulangan While</h4>";
$ulangi = 0;
while($ulangi < 5){
    echo "<p>Ini adalah perulangan ke-$ulangi</p>"; 
    $ulangi++;
}
echo "<hr><h4>Contoh Perulangan Do-While</h4>";
$ulangi = 4;
do {
    echo "<p>ini adalah perulangan ke-$ulangi</p>"; 
    $ulangi--;
} while ($ulangi > 0);
echo "<hr>";
$buah = array('Durian', 'Nangka', 'Jeruk', 'Apel');
foreach($buah as $value) {
    echo $value. "<br>";
}
echo "<p>";
foreach($buah as $key => $value){
    echo "Index ke-" . $key . " adalah " . $value . "<br>";
}
echo "<hr>";
$menu = array(
    ["Nasi pecel", 6000],
    ["Nasi campur", 10000],
    ["Nasi goreng", 12000]
);
$banyak_menu = count($menu);
echo "<table border='1'>
<tr><th>No</th> <th>Nama menu</th> <th>Harga</th></tr>";
$no=1;
for($a=0; $a<$banyak_menu; $a++) {
    echo "<tr><td>" . $no . "</td>";
    for($b=0; $b<count($menu[$a]); $b++){
        echo "<td>" . $menu[$a][$b] . "</td>";
    }
    echo "</tr>";
    $no++;
}
echo "</table>";
?>
</body>
</html>
