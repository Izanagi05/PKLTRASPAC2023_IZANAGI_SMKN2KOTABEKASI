<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Prediksi Scabies Pada Kucing</h1>
        <form action="logistikregresi.php" method="post">
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
            
            <input type="checkbox" name="scabies<?php echo $i?>" value="1">
            <br>
           <?php } ?>


            <br>
            <br>
            <label for="berat">Prediksi kucing dengan berat: </label>
            <input type="text" name="prediksibarat">
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
    $scabies=$_POST['scabies']??'';
    $Yscabiess=[0,0,0,0,0,0,0,0,0,0];
    $prediksibarat=$_POST['prediksibarat']??'';
    $prediksitinggi=$_POST['prediksitinggi']??'';
    $fitur=2;
    $Xawal=[];
    $Yawal=[];
    $iterasi=10;
    $alpha=0.01;
    $fitur=2;
    $rentangX=[];
    $weight=[0,0]; //koeafisien
    $nilaiTertinggi=[]; 
    $bias=0; //konsanta
    $jumlahsempel=10;

    function sigmoidku($x){
        $hitung=1/(1+exp(-$x));
        return $hitung;
    };
    $beratstatis=[20,30,40,50,60,70,70,80,90,10];
    $tinggistatis=[40,20,45,70,90,20,10,30,80,90];
  

    // echo exp(1); 
    $y=[0,1,1,1,0,0,0,0,0,1];
    
    // $y = array_map(function($value) {
    //     return empty($value) ? 0 : 1;
    // }, $scabies);
    
    // for ($ui=0; $ui <$jumlahsempel ; $ui++) {  
    //     $scabies[$ui]=$scabies[$ui]==='1'??0;
    //     $Yscabies=$scabies;
    // }
    for ($kj=0; $kj <$jumlahsempel ; $kj++) { 
        if(isset($_POST['scabies'.$kj])){

            $Yscabiess[$kj]=1;
        }
    }
   



    for ($i=0; $i <$jumlahsempel ; $i++) { 
        $Xawal[$i]=[$beratstatis[$i], $tinggistatis[$i]]; 
        // $Xawal[$i][] = max($berat[$i], $tinggi[$i]);
    }
   
    $rows = count($Xawal);
    $columns = count($Xawal[0]);
    $transposedMatrix = [];

    
    // for ($i = 0; $i < $columns; $i++) {
    //     $transposedRow = [];
    //     for ($j = 0; $j < $rows; $j++) {
    //         $transposedRow[] = $Xawal[$j][$i];
    //     }
    //     $transposedMatrix[] = $transposedRow;
    // }
    // $nilaiTertinggi=[max($transposedMatrix[0]), max($transposedMatrix[1])];
    // for ($z=0; $z < $jumlahsempel ; $z++) { 
    //     $rentangX[$z]= [$berat[$z]/max($transposedMatrix[0]), $tinggistatis[$z]/max($transposedMatrix[1])]; //ubah rwentang 0-1
    // }
  
    for ($j=0; $j <$iterasi ; $j++) { 
        // $prediksi=[];
        $selisihPrediksi = []; 
        $arraySigmoid = []; 
        $hasilkaliSelisihKoef=[];
        $Yprediksi=[]; 
        for ($k=0; $k <$jumlahsempel ; $k++) {  
            $Ypre=[];
            // echo count($weight);
            for ($g=0; $g <count($Xawal[0]) ; $g++) {  
                $Ypre[]=($bias + $Xawal[$k][$g]*  $weight[$g]) ; //$weight[$g] $weight[0][$g]  rentangX
            }
            $Yprediksi[]=   $Ypre;
        } 
      

        $rowsumYPred=count($Xawal);
        $kolsumYPred=count($Xawal[0]);
        $transposedMatrixSigYPred = [];

        for ($bk=0; $bk <$kolsumYPred ; $bk++) { 
            $SigYpre=[];
            for ($cc=0; $cc <$rowsumYPred ; $cc++) {  
                $SigYpre[]= $Yprediksi[$cc][$bk];
            }
                $transposedMatrixSigYPred[] = $SigYpre;
        }
        for ($sigg=0; $sigg <count($Xawal[0]) ; $sigg++) {  
            $sumYprediksi[]=array_sum($transposedMatrixSigYPred[$sigg]);
        }
      
        
        
        //tahap sigmoid
        
        for ($sig=0; $sig <count($Xawal[0]) ; $sig++) { 
            $arraySigmoid[] =sigmoidku($sumYprediksi[0]);
        }
       
            

        for ($e=0; $e <$jumlahsempel ; $e++) { 
            $Sel=[];
            for ($q=0; $q <count($Xawal[0]) ; $q++) {  
                $Sel[]= $arraySigmoid[$q]-$y[$e];
                // $Sel[]= $Yprediksi[$e][$q] - $Xawal[$e][$q];
            }
            $selisihPrediksi[] =$Sel;
        }
      
        for ($bk=0; $bk <$kolsumYPred ; $bk++) { 
            $selisihPreTrans=[];
            for ($cc=0; $cc <$rowsumYPred ; $cc++) {  
                $selisihPreTrans[]= $selisihPrediksi[$cc][$bk];
            }
                $transposedMatrixselisihPreTrans[] = $selisihPreTrans;
        }
        $XtranposeAwal=$transposedMatrixSigYPred;
    
   
     
        for ($ha=0; $ha <count($Xawal[0]) ; $ha++) { 
            $KoefWeight=[];
            for ($yukk=0; $yukk <$jumlahsempel ; $yukk++) {  ///[ [[][][][][][][[]], [[][][][][][][[]] ]  * [ [[][]], [[][]], [[][]], [[][]] ....]
                $KoefWeight[]=1/$jumlahsempel * ($XtranposeAwal[$ha][$yukk] * $transposedMatrixselisihPreTrans[$ha][$yukk]);
            }
            $KoefisienWeight2[]=$KoefWeight;
        }
       
        echo"<pre>"; 
        // echo print_r($XtranposeAwal); 
        // echo print_r($weight); 
        echo print_r($KoefisienWeight2); 
        echo"</pre>";
        // for ($kamu=0; $kamu <count($Xawal[0]) ; $kamu++) {  
        //     $sumweightbaru[]=array_sum($KoefisienWeight2[$kamu]);
        // }
        
      
        for ($bk=0; $bk <$rowsumYPred ; $bk++) { 
            $koefweight2=[];
            for ($cc=0; $cc <$kolsumYPred ; $cc++) {  
                $koefweight2[]= $KoefisienWeight2[$cc][$bk];
            }
                $transposedMatrixkoefweight2[] = $koefweight2;
                
            }
            // echo"<pre>"; 
            // // echo print_r($XtranposeAwal); 
            // // echo print_r($KoefisienWeight2); 
            // echo print_r($weight); 
            // echo"</pre>";
        // for ($wbr=0; $wbr <$jumlahsempel ; $wbr++) { 
        //     $wsem=[];
        //     for ($wbd=0; $wbd <count($Xawal[0]) ; $wbd++) { 
        //         # code...
        //         $wsem[]=$weight[$wbr][$wbd]-($alpha*$KoefisienWeight2[$wbd][$wbr]);
        //     }
        //     $weight[]=$wsem;
        // }
     
        $rowsumPred=count($Xawal);
        $kolsumPred=count($Xawal[0]);
        $transposedMatrixSelPredKons = [];
        for ($bk=0; $bk <$kolsumPred ; $bk++) { 
            $Skonst=[];
            for ($cc=0; $cc <$rowsumPred ; $cc++) {  
                $Skonst[]= $selisihPrediksi[$cc][$bk];
            }
                $transposedMatrixSelPredKons[] = $Skonst;
        }
        
        for ($de=0; $de <count($Xawal[0]) ; $de++) {  
            $selisihKonst[]=array_sum($transposedMatrixSelPredKons[$de])/$jumlahsempel;
        }
        
        for ($u=0; $u <$jumlahsempel ; $u++) {  
            $Koef=[];
            for ($s=0; $s <count($Xawal[0]) ; $s++) {  
                $Koef[]=$Xawal[$u][$s]*$selisihPrediksi[$u][$s];
            }
            $hasilkaliSelisihKoef[]= $Koef;
        }
      
        //tranpose 
        $rowsum=count($Xawal);
        $kolsum=count($Xawal[0]);
        $transposedMatrixSelKoef = [];
        for ($b=0; $b <$kolsum ; $b++) { 
            $Skoef=[];
            for ($c=0; $c <$rowsum ; $c++) {  
                $Skoef[]= $hasilkaliSelisihKoef[$c][$b];
            }
                $transposedMatrixSelKoef[] = $Skoef;
        }
        
        for ($ye=0; $ye <count($Xawal[0]) ; $ye++) {  
            $selisihKoef[]=array_sum($transposedMatrixSelKoef[$ye])/$jumlahsempel;
        }
      

    //    for ($ko=0; $ko <$jumlahsempel ; $ko++) { 
            $Wee=[];
            for ($so=0; $so <count($Xawal[0]) ; $so++) { 
                $Wee[]=$weight[$so]-($alpha* $selisihKoef[$so]);

                $weight[$j]=$Wee[$so];
            }
            echo"<pre>"; 
            echo print_r($weight); 
            // echo print_r($transposedMatrixselisihPreTrans); 
            // echo print_r($KoefisienWeightBaru); 
            echo"</pre>";
            $Kee=[];
            for ($je=0; $je <count($Xawal) ; $je++) { 
                $bias[$je]=$bias[$je]-($alpha* $selisihKonst[$je]);
            }


        // }
      
        // for ($l=0; $l < $jumlahsempel; $l++) { 
        //     $prediksiSaatIni=0;
        //     for ($f=0; $f < $fitur; $f++) { 
                
        //         // $prediksiSaatIni+=$weight[$l]*$Xawal[$i][$f];
        //     }
        // }
        // for ($k=0; $k < $jumlahsempel; $k++) { 
        //     # code...
        // }
    }
    echo"<pre>";
    // echo print_r($berat);
    // echo print_r($tinggi);
    // echo print_r($prediksiSaatIni);
    echo"</pre>";
?>

<!-- 
for ($ha=0; $ha <count($Xawal[0]) ; $ha++) { 
            $KoefWeight=[];
            for ($yukk=0; $yukk <$jumlahsempel ; $yukk++) {  ///[ [[][][][][][][[]], [[][][][][][][[]] ]  * [ [[][]], [[][]], [[][]], [[][]] ....]
                $KoefWeight[]= $XtranposeAwal[$ha][$yukk] * $selisihPrediksi[$yukk][$ha];
            }
            $KoefisienWeightBaru=$KoefWeight;
        } -->