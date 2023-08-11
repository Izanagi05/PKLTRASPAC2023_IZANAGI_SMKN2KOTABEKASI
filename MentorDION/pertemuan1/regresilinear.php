
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="regresilinear.php" method="post">
        <?php
 

 for ($i=1; $i <= 10; $i++) { ?>
        
            hari ke  <?php echo $i ?> <input type="number" name="penjualan[]" value="6">
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

    $iterasi=100;
    $alpha=0.9;
    $jumlahsempel=count($Ypenjualan);
    $Xhari= array_keys($Ypenjualan);
    // $tes= array_keys($hariprediksi);
    $rentangXHari=[];
    $konstantaA=0;
    $koefisienB=0;
    $jumX=$jumlahsempel; ///jumlah sempel. berarti 10
    
    $valueYpenjualanawal= $Ypenjualan; 
    // if($hariprediksi>max($Xhari)){
    //     $Xhari[]=$hariprediksi;
    // }
    $nilaiTertinggiH=max($Xhari);  
    for ($z=0; $z < $jumlahsempel ; $z++) { 
        $rentangXHari[$z]= $Xhari[$z]/$nilaiTertinggiH;
    }
 
    $Ypenjualan[]= 0;
    for ($k=0; $k <= $iterasi; $k++) { 
        $selisihPrediksi = []; 
        $hasilkaliSelisihKoef=[];
        $Yprediksi=[];
        for ($i=0; $i <$jumlahsempel ; $i++) { 
            # code...
            $Yprediksi[$i] =$konstantaA + $koefisienB *$rentangXHari[$i];
        } 
        for ($o=0; $o <$jumlahsempel ; $o++) { 
            $selisihPrediksi[]=$Yprediksi[$o]-$Ypenjualan[$o];
        }
    
        for ($u=0; $u <$jumlahsempel ; $u++) {  
            $hasilkaliSelisihKoef[$u]=$rentangXHari[$u]*$selisihPrediksi[$u];
        }
        $selisihKoef=array_sum($hasilkaliSelisihKoef)/$jumlahsempel;

        $koefisienB=$koefisienB-($alpha*$selisihKoef);
        $selisihKons=array_sum($selisihPrediksi)/$jumlahsempel;
        $konstantaA=$konstantaA-($alpha*$selisihKons);
    }
        $YprediksiAkhir= $konstantaA+$koefisienB*$hariprediksi;
       
     
        echo"<pre>";
        print_r($YprediksiAkhir );
        echo"</pre>";
        exit();
    
        // $jumY=array_sum($Ypenjualan);
        // $jumX=array_sum($Xhari);
        // //nyari Koefisien B

        // $rataY= $jumY / $jumlahsempel;
        // $rataX= $jumX / $jumlahsempel;
        
        // $pembilangB=( $jumY - $rataY)-($jumX - $rataX);
        // $penyebutB=($jumX - $rataX)*($jumX - $rataX);
        // $koefisienB=$pembilangB/$penyebutB;
        
        // $konstantaA= $rataY- $koefisienB * $rataX;
        // $Yprediksi = [];
        // $selisihKoefBaru=0;
        // $selisihKonstBaru=0;
    
        echo"<pre>";
        print_r($YprediksiAkhir );
        echo"</pre>";
     

    // for ($e=0; $e <= $jumlahsempel ; $e++) { 
    //     $selisihPrediksi[$e]=$nilaiPrediksi[$e] - $Ypenjualan[$e]; ///tahap mencari selisih prediksi
    // }
    // // echo"<pre>p"; 
    // // print_r($selisihPrediksi);
    // // echo"</pre>";
    //     for ($r=0; $r <=$jumlahsempel ; $r++) { 
    //         # code...
    //         $hasilsum1[$r]= $Ypenjualan[$r]*$selisihPrediksi[$r]/$jumlahsempel;
    //         // $selisihKoef= array_sum($hasilsum1);
    //     }
    //     $sum1 = array_sum($hasilsum1);
    //     $selisihKoef= $sum1;
    //     $koefBaru= $koefisienB - ($alpha * $selisihKoef);
    //     for ($u=0; $u <=$jumlahsempel ; $u++) { 
    //         # code...
    //         $hasilsum2[$u]= $selisihPrediksi[$u]/$jumlahsempel; //cari selisih konstanta

    //     }
    //     $sum2 = array_sum($hasilsum2);
    //     $selisihKons=$sum2;

    //     $konsBaru= $konstantaA - ($alpha*$selisihKons); //cari konstanta baru
    //     $YprediksiAkhir = $konsBaru + $koefBaru*$hariprediksi;
    // // } 
    //     // $selisihKons= array_sum($sum2);
       




    // for ($i = 0; $i < $jumlahsempel; $i++) {
    //     $Ypenjualan[$i] = $Ypenjualan[$i] / $nilaiTertinggi;
    //      //X array ke 1 sampai terttinggi diubah rentangnya jadi 0, 1  

    //     //[20,50,100] y[i]/ntinggi///// 20/100=0,2  100/100=1
    // }
  
    }

//Y = A+ BX //persamaan regresi



        // echo "hasil prediksi ".$selisihPrediksi;

  // echo print_r($Ypenjualan);
    //PROSES Y =A+BX
    // foreach ($Ypenjualan as $pnjln) {
    //     $jumY += intval($pnjln); // nilai dari masing2 jumlah sampelnya
    //     # 
    // }
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

?>