<?php
echo "<h2><u>Daftar Alat Tulis</u></h2><p>";
$barang = ["Buku Tulis", "Penghapus", "Spidol"];
echo $barang[0] . "<br>";
echo $barang[1] . "<br>";
echo $barang[2] . "<br>";
echo "<hr>";
$mahasiswa = [
    ["Ari", 123123, "Komputer"],
    ["Bayu", 123321, "Mesin"],
    ["Citta", 321123, "Akuntansi"]
];
echo "<h2><u>Daftar Mahasiswa</u></h2><p>";
echo "Nama Mahasiswa: " . $mahasiswa[0][0] . "<br>";
echo "NIM: " . $mahasiswa[0][1] . "<br>";
echo "Prodi: " . $mahasiswa[0][2] . "<br><p>";
echo "Nama Mahasiswa: " . $mahasiswa[1][0] . "<br>";
echo "NIM: " . $mahasiswa[1][1] . "<br>";
echo "Prodi: " . $mahasiswa[1][2] . "<br><p>";
echo "Nama Mahasiswa: " . $mahasiswa[2][0] . "<br>";
echo "NIM: " . $mahasiswa[2][1] . "<br>";
echo "Prodi: " . $mahasiswa[2][2] . "<br>";
echo "<hr>";
$menu = [
    "menu1" => ["nama" => "Nasi Pecel", "harga" => 6000],
    "menu2" => ["nama" => "Nasi Kuning", "harga" => 8000],
    "menu3" => ["nama" => "Nasi Campur", "harga" => 10000]
];
echo "<h3>Daftar Menu dan Harga</h3>";
echo $menu["menu1"]['nama'] . " Rp. " . $menu["menu1"]['harga'] . "<br>";
echo $menu["menu2"]['nama'] . " Rp. " . $menu["menu2"]['harga'] . "<br>";
echo $menu["menu3"]['nama'] . " Rp. " . $menu["menu3"]['harga'] . "<p>";
echo "<hr>";
$menu = [
    ["nama" => "Nasi Pecel", "harga" => 6000],
    ["nama" => "Nasi Kuning", "harga" => 8000],
    ["nama" => "Nasi Campur", "harga" => 10000]
];
echo "<h3><font color='blue'>Daftar Menu dan Harga</font></h3>";
echo $menu[0]['nama'] . " Rp. " . $menu[0]['harga'] . "<br>";
echo $menu[1]['nama'] . " Rp. " . $menu[1]['harga'] . "<br>";
echo $menu[2]['nama'] . " Rp. " . $menu[2]['harga'] . "<p>";
echo "<hr>";
echo "<h2><u>Contoh Array dalam Array</u></h2>";
$mahasiswa = [
    ["nama" => "Adi", "NIM" => "123", "prodi" => "Teknologi Informasi"],
    ["nama" => "Beni", "NIM" => "456", "prodi" => "Akuntansi"],
    ["nama" => "Citra", "NIM" => "789", "prodi" => "Teknik Sipil"]
];
foreach ($mahasiswa as $key => $value) {
    echo $value['nama'] . "<br>";
    echo "NIM: " . $value['NIM'] . "<br>";
    echo "Prodi: " . $value['prodi'] . "<p>";
}
?>
