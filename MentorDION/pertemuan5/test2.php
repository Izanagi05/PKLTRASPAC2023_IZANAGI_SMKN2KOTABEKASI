<?php 

$kalimatDatabase = $_POST['databasekata']??' ';
$kalimatTypo =  $_POST['katatypo']??'';
$kalimatStrReplace = str_replace(' ', '', $kalimatDatabase);
$kalimatPisah = explode(' ', $kalimatDatabase);
$kalimatStrReplaceTypo = str_replace(' ', '', $kalimatTypo);
$kalimatStrReplaceTypoPisah = explode(' ', $kalimatTypo);
// echo "<pre><br><hr>";
// echo "<br>"; 
// echo print_r($kalimatStrReplaceTypoPisah);
// echo "<br>";
$prediksiAkhir=null;
if($_POST['submit']??''){
for ($typ=0; $typ <count($kalimatStrReplaceTypoPisah) ; $typ++) { 
    # code...

$frekuensiHurufTypo = [];
$frekuensiHurufDtbs = [];
$HasilKaliPembilang = [];

$sumHasilKalipembilang = [];
for ($t = 0; $t < count($kalimatPisah); $t++) {
    $kataDtbs = $kalimatPisah[$t]; 

    for ($j = 0; $j < strlen($kataDtbs); $j++) {
        $hurufDtbs = $kataDtbs[$j];
        $frekuensiHurufDtbs[$t][$hurufDtbs] = substr_count($kataDtbs, $hurufDtbs);
        $frekuensiHurufTypo[$t][$hurufDtbs] = substr_count($kalimatStrReplaceTypoPisah[$typ], $hurufDtbs);
    }

    // Calculate the product of frequencies
    for ($k = 0; $k < strlen($kataDtbs); $k++) {
        $hurufKey = $kataDtbs[$k];
        $HasilKaliPembilang[$t][$hurufKey] = $frekuensiHurufDtbs[$t][$hurufKey] * $frekuensiHurufTypo[$t][$hurufKey];
        // echo ($HasilKaliPembilang[$t][$hurufKey]);
        $sumHasilKalipembilang[$t] = array_sum($HasilKaliPembilang[$t]);
    }
    for ($k = 0; $k < strlen($kataDtbs); $k++) {
        $hurufkuadrakey =  $kataDtbs[$k];
        $kuadratDtbs[$t][$hurufkuadrakey] = $frekuensiHurufDtbs[$t][$hurufkuadrakey] ** 2;
        $kuadratTypo[$t][$hurufkuadrakey] = $frekuensiHurufTypo[$t][$hurufkuadrakey] ** 2;
        $sumkuadratDtbs[$t] = array_sum($kuadratDtbs[$t]);
        $sumkuadratTypo[$t] = array_sum($kuadratTypo[$t]);

        $HasilPenyebut[$t] = sqrt($sumkuadratDtbs[$t]) * sqrt($sumkuadratTypo[$t]);
        if ($HasilPenyebut[$t] != 0) {
            $Hasilawal[$t] = $sumHasilKalipembilang[$t] / $HasilPenyebut[$t];
        } else { 
            $Hasilawal[$t] = 0; //hanlde error by zeronyaaa
        } 
    }
}

$caritertinggi[] = max($Hasilawal);
$indextertinggi[] = array_search($caritertinggi[$typ], $Hasilawal);

$prediksiAkhir[]=$kalimatPisah[$indextertinggi[$typ]];
}
echo "<pre><br><hr>";
echo "<br>";
// echo print_r($frekuensiHurufDtbs);
// echo print_r($frekuensiHurufTypo);
// // echo print_r($HasilKaliPembilang);
// echo print_r($kuadratDtbs);
// echo print_r($kuadratTypo);
// echo print_r($sumHasilKalipembilang);
// echo print_r($sumkuadratDtbs);
// echo print_r($sumkuadratTypo);
// echo print_r($Hasilawal);
echo print_r($prediksiAkhir);
echo "<br>";
// echo print_r($Hasilawal);
echo "</pre>";
}






// for ($k=0; $k <strlen($kalimatStrReplace) ; $k++) { 
//     $hurufkuadrakey = $kalimatStrReplace[$k];
//    $kuadratDtbs[$hurufkuadrakey]=$frekuensiHurufDtbs[$hurufkuadrakey]**2;
//    $kuadratTypo[$hurufkuadrakey]=$frekuensiHurufTypo[$hurufkuadrakey]**2;
// }
// $sumHasilKalipembilang=array_sum($HasilKaliPembilang);
// $sumkuadratDtbs=array_sum($kuadratDtbs);
// $sumkuadratTypo=array_sum($kuadratTypo);
// for ($i = 0; $i < strlen($kalimatStrReplaceTypo); $i++) {
//     $hurufTypo = $kalimatStrReplace[$i];
// }
// $HasilPenyebut=sqrt($sumkuadratDtbs)*sqrt($sumkuadratTypo);
// $Hasilawal=$sumHasilKalipembilang/$HasilPenyebut;
// $Bulatkan=number_format($Hasilawal);


$angka = 25;
echo "<pre><br><hr>hr<br>";
// echo print_r($Hasilawal); 
// // echo print_r($kalimatStrReplace); 
// // echo print_r($kuadratDtbs); 
// // echo print_r($kuadratTypo); 
// echo"<br>";
// echo print_r($sumHasilKalipembilang); 
// echo"<br>";
// echo print_r($sumkuadratDtbs); 
// // echo print_r($frekuensiHurufTypo); 
// // echo print_r($kuadratTypo); 
// echo"<br>";
// echo print_r($sumkuadratTypo); 
echo "<br>";
// echo print_r($HasilKaliPembilang); 
echo "</pre>";

// $kalimattypo='';


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Typo Correction</h1>

<body>
    <form action="test2.php" method="post">
        <p>database kata :</p>
        <textarea name="databasekata" id="" cols="30" rows="10"></textarea>
        <p>kata yang typo :</p>
        <input type="text" name="katatypo">
        <br>
        prediksi kata yang benar : <b> <?php foreach ($prediksiAkhir as $key => $value) {
            # code...
            echo $value. ' '; 
        } 
            ?></b>
        <input type="submit" name="submit" value="prediksi">
    </form>
</body>

</html>