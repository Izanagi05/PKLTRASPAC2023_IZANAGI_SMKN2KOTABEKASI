


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="mangacafe.php" method="POST">

        Nama: <input type="text" placeholder="nama" name="nama">
        <br>
        Umur: <input type="number" placeholder="umur" name="umur">
        <br>
        Kelamin: 
        <input type="radio"  name="kelamin" value="Laki-laki">Laki laki
        <input type="radio"  name="kelamin" value="Perempuan">Perempuan
        <br>
        Jam datang: <input type="time" value="<?php echo date('H:i'); ?>" placeholder="jam datang" name="jam">
        <br>
        Bersama teman: 
        <input type="radio" name="bersamateman" value="Laki-laki">Laki laki
        <input type="radio" name="bersamateman" value="Perempuan">Perempuan
        <input type="radio" name="bersamateman" value="Sendirian">Sendirian
        <br>
        <input type="submit" name="submit">
    </form>

   
</body>
</html>

<?php
    $nama= $_POST['nama']??'';
    $umur= $_POST['umur']??'';
    $kelamin= $_POST['kelamin']??'';
    $jam= $_POST['jam']??'';
    $bersama= $_POST['bersamateman']??'';


    $status='';
    $ruang='';
    $pasangan='';
    $k='';



    if(($umur<20) &&($kelamin === "Perempuan" && $bersama ==="Laki-laki" ||$kelamin === "Laki-laki" &&$bersama ==="Perempuan")){
            $pasangan="Tidak diizinkan membawa pasangan";

    }

    if ($bersama ==="Sendirian"){
            $ruang="Privat dan Publik";
    }else if ($kelamin === "Perempuan" && $bersama ==="Laki-laki" ||$kelamin === "Laki-laki" &&$bersama ==="Perempuan"){
            $ruang="Publik";
            
    }else{
            $ruang="Privat dan Publik";

        }

    if($jam<"14:00"&& $umur>=20){
        $k=1;
    }else if($jam<"14:00"&&$umur<20){
        $k=0;
    }else if($jam>="14:00"&& $umur<20){
        $k=1;   
    }
    else{
        $k=1;
    }

    
    if($k==1){
        $status="Boleh masuk";
    }else{
        $ruang="_";
        $status="Tidak boleh masuk";
    }


    echo"<br>";
    echo"<br>";
    echo "<b>Nama:</b> $nama <br>";
    echo "<b>Usia:</b> $umur <br>";
    echo "<b>Jam:</b> $jam <br>";
    echo "<b>Status:</b> $status <br>";
    echo "<b>Ruang:</b> $ruang <br>";
    echo "Catatan: $pasangan";
    


?>