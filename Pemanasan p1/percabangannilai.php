
<?php
$opsi= $_POST['opsi']??'';
$hasil='';
    $data=[
        'Celia'=>'S',
        'Flora'=>'A',
        'Haruto'=>'A',
        'Kaori'=>'B',
        'Hajime'=>'C',
        'Yue'=>'S',
        'Wein'=>'S',
        'Ninym'=>'B',
    ];
    function ketpredikat($nilaii){
        switch ($nilaii) {
            case 'S':
                return "Istimewa";
            case 'A':
                return "Dengan pujian";
            case 'B':
                return "Baik";
            case 'C':
                return "Cukup";
            case 'D':
                return "Dimaklumi";
            default:
                return "Tidak valid";
        }
    }
    $predikat =[
        'S'=>'Istimewa',
        'A'=>'Dengan Pujian',
        'B'=>'Baik',
        'C'=>'Cukup',
        'D'=>'Dimaklumi',
    ];

if($_POST['submit']){

    
    if($opsi==='semuasiswa'){
        foreach ($data as $nama => $nilai) {
            $predikatsiswa=ketpredikat($nilai);
            echo "<b>$nama</b> dengan nilai <b>$nilai</b> mendapat predikat <b> $predikatsiswa </b> <br>" ;
        }
    }else{
        // $hasil= "<b>$data[$nama]</b> dengan nilai <b>$predikat[]</b> mendapat predikat <b> $predikatsiswa </b> <br>" ;
       $t= $data[$opsi];
        $predikatsiswa = ketpredikat($t); // Corrected this line
        echo "<b>$opsi</b> dengan nilai <b>{$data[$opsi]}</b> mendapat predikat <b>{$predikatsiswa}</b> <br>";
    
    }
}
    echo $hasil;

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="percabangannilai.php" method="post">

    <select name="opsi" id="">
        <option value="semuasiswa">Semua siswa</option>
        <?php foreach ($data as $nama => $nilai){ ?>
            <option value="<?php echo $nama; ?>"><?php echo $nama;?></option>

            <?php } ?>
            
    </select>
    <input type="submit" value="submit" name="submit">
</form>
</body>
</html>

