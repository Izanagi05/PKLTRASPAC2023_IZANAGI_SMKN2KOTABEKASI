
<?php
$input = $_POST['inputnom'] ?? '';
$Opsi = $_POST['opsi'] ?? '';

$output = null; 

function sigmoidku($x){
    $hitung=1/(1+exp(-$x));
    return $hitung;
};
function tanhku($x){
    $sinh= exp($x)-exp(-$x);
    $cosh= exp($x)+exp(-$x);
    $tanh=$sinh/$cosh;
    return $tanh;
}
if ($Opsi === "relU") {
    $output=max(0, $input);
} elseif ($Opsi === "sigmoid") {
    $output = sigmoidku($input);
} elseif ($Opsi === "tanh") {
    $output = tanhku($input); 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Implementasi Fungsi Aktivasi</h1>
    <form action="fungsiaktivasi.php" method="post">
        <input type="number" name="inputnom">
        <select name="opsi" id="">
            <option value="relU">RelU</option>
            <option value="sigmoid">Sigmoid</option>
            <option value="tanh">Tanh</option>
        </select>
        <input type="submit" name="submit" value="Hitung Output">
        <input type="number" name="output" value="<?= $output ?>">
    </form> 

</body>

</html>

