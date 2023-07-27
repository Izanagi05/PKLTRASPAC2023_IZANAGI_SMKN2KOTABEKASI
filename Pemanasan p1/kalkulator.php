


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action="kalkulator.php" method="post">

    <select name="opsi" id="">
        
<option value="+">+</option>
<option value="-">-</option>
<option value="x">x</option>
<option value=":">:</option>
<option value="%">%</option>
</select>
    <input type="text" name="bil1" placeholder="Bilangan 1">
    <input type="text" name="bil2" placeholder="Bilangan 2">
    <input type="submit" name="submit" >

    
</form>
</body>
</html>

<?php


function hitung($opsi, $bil1, $bil2) {
    switch ($opsi) {
        case '+':
            return $bil1 + $bil2;
        case '-':
            return $bil1 - $bil2;
        case 'x':
            return $bil1 * $bil2;
        case ':':
            if ($bil2 == 0) {
                return "Tidak bisa dibagi dengan 0";
            } else {
                return $bil1 / $bil2;
            }
        case '%':
            return $bil1 % $bil2;
        default:
            return "Operasi tidak valid";
    }
}

$opsinya = $_POST['opsi'] ?? '';
$bil1 = $_POST['bil1'] ?? '';
$bil2 = $_POST['bil2'] ?? '';

if (isset($_POST['submit'])) {
    $hasil = hitung($opsinya, $bil1, $bil2);
    echo $hasil;
}

    
?>
