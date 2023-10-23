

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="regresilinear2.php" method="post">
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

    $iterasi=10;
    $alpha=0.1;
    $jumlahsempel=count($Ypenjualan);
    $Xhari= array_keys($Ypenjualan);
    $rentangXHari=[];
   
    $jumX=$jumlahsempel; ///jumlah sempel. berarti 10
    
    $valueYpenjualanawal= $Ypenjualan;
    // $nilaiTertinggiXhari = max($Xhari);
    if($hariprediksi>max($Xhari)){

        $Xhari[]=$hariprediksi;
    }

    $nilaiTertinggiH=max($Xhari);  
    $jumY=array_sum($Ypenjualan);
    $jumX=array_sum($Xhari); 
    $rataY= $jumY / $jumlahsempel;
    $rataX= $jumX / $jumlahsempel;
    $Ypenjualan[]=0;
    for ($z=0; $z < $jumlahsempel ; $z++) { 
        $rentangXHari[$z]= $Xhari[$z]/$nilaiTertinggiH;
        $pembilangB[$z]=( $Ypenjualan[$z] - $rataY)-($rentangXHari[$z] - $rataX);
        $penyebutB[$z]=($rentangXHari[$z] - $rataX)*($rentangXHari[$z] - $rataX);
        
        $koefisienB[$z]=$pembilangB[$z]/$penyebutB[$z];
        
        $konstantaA[$z]= $rataY- $koefisienB[$z] * $rataX;
        $Yprediksi[$z]=$konstantaA[$z]+($koefisienB[$z]*$rentangXHari[$z]);
    }
    echo"<pre>p"; 
    print_r($Yprediksi);
    echo"</pre>";
    
    for ($k=0; $k < $iterasi; $k++) { 
            $selisihPrediksi=[];
            $selisihPrediksi[]=$Yprediksi[$k]-$Ypenjualan[$k];
            
            $hasilkaliselisihKoefisien[$k]= $rentangXHari[$k]*$selisihPrediksi[$k];
            $selisihKoefisien=array_sum($hasilkaliselisihKoefisien)/$jumlahsempel;

            $koefisienBaru[$k]=$koefisienB[$k]-($alpha*$selisihKoefisien);
            $selisihKonstanta=array_sum($selisihPrediksi)/$jumlahsempel;
            $konstantaBaru=$konstantaA[$z]-($alpha*$selisihKonstanta);

            $YprediksiAkhhir= $konstantaBaru + $koefisienBaru[$k]*$Xhari[$k];
        }
        
        echo"<pre>pni "; 
            print_r($YprediksiAkhhir);
            echo"</pre>";

    
    

        
}
?>




