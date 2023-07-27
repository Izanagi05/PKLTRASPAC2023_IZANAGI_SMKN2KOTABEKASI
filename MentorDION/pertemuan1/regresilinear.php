
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="regresilinear.php" method="post">
        <?php for ($i=1; $i <= 10; $i++) { ?>
        
            hari ke  <?php echo $i ?> <input type="number" name="penjualan[]" value="1">
            <br>
            <?php }?>
    
            <br>

    prediksi hari ke <input type="number" name="hariprediksi" value="1">
    <input type="submit" name="submit">
</form>
</body>
</html>

<?php
if($_POST['submit']??''){

    $Ypenjualan = $_POST['penjualan']??'';
    $hariprediksi = $_POST['hariprediksi']??'';
    $prediksi=0;
    $jumY=0;
    $jumX=0;

    $iterasi=10;
    $alpha=0.1;
    $jumlahsempel=count($Ypenjualan);
    $konstantaA=0;
    $koefisienB=0;
    $jumX=$jumlahsempel; ///jumlah sempel. berarti 10
    

    
    $nilaiTertinggi = max($Ypenjualan);
    for ($i = 0; $i < $jumlahsempel; $i++) {
        $Ypenjualan[$i] = $Ypenjualan[$i] / $nilaiTertinggi; //X array ke 1 sampai terttinggi diubah rentangnya jadi 0, 1  
        //[20,50,100] y[i]/ntinggi///// 20/100=0,2  100/100=1
    }
    // echo print_r($Ypenjualan);
    
    //PROSES Y =A+BX
    foreach ($Ypenjualan as $pnjln) {
        $jumY += intval($pnjln); // nilai dari masing2 jumlah sampelnya
        # 
    }
//nyari Koefisien B
    $rataY= $jumY / $jumlahsempel;
    $rataX= $jumX / $jumlahsempel;

        $pembilangB=( $jumY - $rataY)-($jumX - $rataX);
        $penyebutB=($jumX - $rataX)*($jumX - $rataX);
        $koefisienB=$pembilangB/$penyebutB;
        
        // $prediksi= $jumY -$hariprediksi;
        // for ($j = 0; $j < $jumlah_sampel; $j++) {
        // $y_pred[$j] = $konstanta + $koefisien * ($j + 1);
        // $selisih_prediksi[$j] =$y_pred[$j] - $penjualan[$j];
        // $selisih_koef += ($j + 1) *$selisih_prediksi[$j];
        // $selisih_konst += $selisih_prediksi[$j];

        // $selisih_koef /= $jumlah_sampel;
        // $selisih_konst /= $jumlah_sampel;
        // $koefisien -= $alpha * $selisih_koef;
        // $konstanta -= $alpha * $selisih_konst;
        // }
//NYari konstanta A

            $konstantaA= $rataY- $koefisienB * $rataX;
            
            for ($k=0; $k <= $iterasi; $k++) { 
                $Yprediksi = [];
                $selisihPrediksi = [];
                $selisihKoefBaru=0;
                $selisihKonstBaru=0;

                $Yprediksi[$k] =$konstantaA + $koefisienB *$Ypenjualan[$k];
            
                for ($i=0; $i <= $jumlahsempel; $i++) { 
                    
                    $selisihPrediksi[$i]= $Yprediksi[$i] - $Ypenjualan[$i];
                }
            
            }

//Y = A+ BX //persamaan regresi



        echo "hasil prediksi ".$selisihPrediksi;
}

?>
