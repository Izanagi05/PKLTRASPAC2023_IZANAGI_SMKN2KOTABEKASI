

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
        <!-- prediksi kata yang benar : <?php echo $prediksiAkhir ?> -->
        <input type="submit" name="submit" value="prediksi">
    </form>
</body>

</html>