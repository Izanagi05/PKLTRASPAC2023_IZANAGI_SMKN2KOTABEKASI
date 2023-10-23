<?php

use PhpParser\Node\Expr\Print_;

$namaGambar = "a63cek.png";

// Path lengkap ke direktori gambar (gantilah dengan path yang sesuai)
$pathKeGambar = "uploads/" . $namaGambar;

// Menghasilkan URL gambar yang lengkap
$urlGambar = $pathKeGambar;
$imggd = imagecreatefrompng($urlGambar);
// $rgb = imagecolorat($imggd, 10, 15);
$lebar = imagesx($imggd);
$tinggi = imagesy($imggd);
$array_warna = [];
for ($y = 0; $y < $tinggi; $y++) { //ats bawah
    for ($x = 0; $x < $lebar; $x++) { //kanan kiri
        $warna = imagecolorat($imggd, $x, $y);
        $rgb = imagecolorsforindex($imggd, $warna);
        unset($rgb['alpha']);
        $array_warna[] = $rgb;
    }
}
echo "<pre>";

$maxiterasi = 2;
// $maxiterasi = count($array_warna);
$centroids = array_rand($array_warna, 3);
$centroid_terpilih = [];
foreach ($centroids as $key => $cntrds) {
    $centroid_terpilih[] = $array_warna[$cntrds];
}
echo "<pre>";
// echo print_r($array_warna[0] );
// echo print_r($centroid_terpilih );
// exit();
echo "</pre>";
$jarak_semua_data = [];
$kelompok=[];
for ($n = 0; $n < $maxiterasi; $n++) {
    
    for ($i=0; $i <count($array_warna) ; $i++) { 
    $datawarna = $array_warna[$i];
    // $hasilrumus=[];
    $selisihwarna = [];
    $jarak_data = [];
    //   $datarumus[]=  $array_warna[$i][$j]-$centroid_terpilih[$j];
    for ($j = 0; $j < count($centroid_terpilih); $j++) {
        $selisihwarna = [
            'red' => $array_warna[$i]['red'] - $centroid_terpilih[$j]['red'],
            'green' => $array_warna[$i]['green'] - $centroid_terpilih[$j]['green'],
            'blue' => $array_warna[$i]['blue'] - $centroid_terpilih[$j]['blue']
        ];

        $kuadratJarak = ($selisihwarna['red'] ** 2) + ($selisihwarna['green'] ** 2) + ($selisihwarna['blue'] ** 2);
        $jarak = sqrt($kuadratJarak); 
        $jarak_data[] = $jarak;
    }
    // $datawarna['original_index'] = $i
    $cari_terdekat = array_search(min($jarak_data), $jarak_data);
    // exit();
    $kelompok[$cari_terdekat][] = $datawarna;

    $newCentroids = [];
    foreach ($kelompok as $dataDalamKelompok) {
        $totalRed = 0;
        $totalGreen = 0;
        $totalBlue = 0;
        $totalData = count($dataDalamKelompok);

        foreach ($dataDalamKelompok as $data) {
            $totalRed += $data['red'];
            $totalGreen += $data['green'];
            $totalBlue += $data['blue'];
        }

        $newCentroids[] = [
            'red' => $totalRed / $totalData,
            'green' => $totalGreen / $totalData,
            'blue' => $totalBlue / $totalData
        ];
    }
    $centroid_terpilih = $newCentroids;
}
    // $jarak_semua_data[] = $jarak_data; //cari jarak terndah pda ketiga  centroid di tiap data ke i 
}

// print_r(count($kelompok[1]));
echo "<pre>";
// print_r(array_sum(array_column($kelompok[2], 'red')));
// echo print_r($cari_terdekat);
// echo print_r($kelompok);
echo print_r($jarak_semua_data);
echo "</pre>";
echo "<pre> centroid";
echo print_r($centroid_terpilih);
echo "</pre>";
echo print_r($selisihwarna);
// $rumus










// gbr baru
$gambar_baru = imagecreatetruecolor($lebar, $tinggi);

// //lloop gbr bru

// for ($y = 0; $y < $tinggi; $y++) {
//     for ($x = 0; $x < $lebar; $x++) {
//         $warna = $array_warna[$y][$x];
//         imagesetpixel($gambar_baru, $x, $y, $warna);
//     }
// }
// $x = 176 % $lebar;// 174%174 sisa 0//kesamping
// $y = floor(21402 / $lebar);//kebawah

// echo "<pre>";
// echo print_r($x);
// echo print_r($y);
// // echo print_r($lebar);
// echo "</pre>";
for ($i = 0; $i < count($array_warna); $i++) {
    $x = $i % $lebar; //di baris i trs pilih kolom ke i [[][][][][][][][][][][][][][]...]
    $y = floor($i / $lebar); //baris ke i 
    $warna_rebuild = imagecolorallocate($gambar_baru, $array_warna[$i]['red'], $array_warna[$i]['green'], $array_warna[$i]['blue']);
    imagesetpixel($gambar_baru, $x, $y, $warna_rebuild);
}
// Simpan gambar baru ke file
$nama_file_baru = "gambar_baru.png";
imagepng($gambar_baru, $nama_file_baru);

// Tutup gambar 
// imagedestroy($imggd);
// imagedestroy($gambar_baru);

// Tampilkan gambar baru dalam HTML
echo '<img src="' . $nama_file_baru . '" alt="Gambar Baru">';
echo "<pre>";

echo "</pre>";
// var_dump($array_warna);
// echo $urlGambar;
// echo "<img src='$urlGambar' alt='Gambar yang diunggah'>";


//-------
if (isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_extensions = array("jpg", "png", "jpeg", "gif");

    if (in_array($imageFileType, $allowed_extensions)) {
        // Coba untuk mengunggah gambar
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "tampil<br>";
            echo "<img src='$target_file' alt='Gambar yang diunggah'>";
        } else {
            echo "gagal";
        }
    } else {
        echo "gagal pilih format yang benr";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Upload dan Tampilkan Gambar</title>
</head>

<body>
    <h2>Upload dan Tampilkan Gambar</h2>
    <form action="kmeansclustering.php" method="post" enctype="multipart/form-data">
        Pilih gambar untuk diunggah:
        <input type="file" name="gambar" id="gambar">
        <input type="submit" value="Unggah Gambar" name="submit">
    </form>

</body>

</html>