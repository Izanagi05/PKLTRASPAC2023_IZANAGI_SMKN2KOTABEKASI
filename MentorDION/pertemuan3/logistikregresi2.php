<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Prediksi Scabies Pada Kucing</h1>
        <form action="logistikregresi2.php" method="post">
            <?php 

  for ($i=0; $i <10 ; $i++) { 
                
            ?>

         Kucing <?php echo $i+1?>
         <br>
            <label for="berat">Berat</label>
            <input type="text" name="berat[]">
            <label for="berat">Tinggi</label>
            <input type="text" name="tinggi[]"> 
            <label for="scabies">Terkena Scabies:</label>
            <input type="checkbox" name="scabies[]">
            <br>
           <?php } ?>


            <br>
            <br>
            <label for="berat">Prediksi kucing dengan berat: </label>
            <input type="text" name="prediksiberat">
            <label for="berat">dan tinggi</label>
            <input type="text" name="prediksitinggi">
            <br>
            <input type="submit" name="submit" value="prediksi">
        </form>
</body>
</html>

<?php
    $berat=$_POST['berat']??'';
    $tinggi=$_POST['tinggi']??'';
    $prediksiberat=$_POST['prediksiberat']??'';
    $prediksitinggi=$_POST['prediksitinggi']??'';
    $fitur=2;
    $Xawal=[];
    $Yawal=[];
    $iterasi=10;
    $alpha=0.01;
    $weight=[0,0]; //koeafisien
    $bias=0; //konsanta
    $jumlahsempel=count($berat);

    
    
    for ($i=0; $i <$jumlahsempel ; $i++) { 
        $Xawal[$i]=[$berat[$i], $tinggi[$i]]; 
    }
    echo"<pre>";
    echo print_r($berat);
    // echo print_r($tinggi);
    // echo print_r($Xawal[0][1]);
    echo"</pre>";

    for ($j=0; $j <$iterasi ; $j++) { 
        // $prediksi=[];
        for ($l=0; $l < $jumlahsempel; $l++) { 
            $prediksiSaatIni=0;
            for ($f=0; $f < $fitur; $f++) { 
                
                $prediksiSaatIni+=$weight[$l]*$Xawal[$i][$f];
            }
        }
        // for ($k=0; $k < $jumlahsempel; $k++) { 
        //     # code...
        // }
    }
    echo"<pre>";
    // echo print_r($berat);
    // echo print_r($tinggi);
    echo print_r($prediksiSaatIni);
    echo"</pre>";
?>