


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

class MangaCafe{
    private $nama='',
     $umur='',
     $kelamin='',
     $jam='',
     $bersama='';

     public function __construct($nama, $umur, $kelamin, $jam, $bersama){

        $nama= $this->nama;
        $umur= $this->umur;
        $kelamin= $this->kelamin;
        $jam= $this->jam;
        $bersama= $this->bersama;
     }

    public function ambilhasil(){
        $status='';
        $ruang='';
        $pasangan='';
        $k='';

    
            if(($this->umur<20) &&($this->kelamin === "Perempuan" && $this->bersama ==="Laki-laki" ||$this->kelamin === "Laki-laki" &&$this->bersama ==="Perempuan")){
                $pasangan="Tidak diizinkan membawa pasangan";
                // $ruang='_';
                // $status='_';
            }
    
        if ($this->bersama ==="Sendirian"){
                $ruang="Privat dan Publik";
            }else if ($this->kelamin === "Perempuan" && $this->bersama ==="Laki-laki" ||$this->kelamin === "Laki-laki" &&$this->bersama ==="Perempuan"){
                $ruang="Publik";
                
            }else{
                $ruang="Privat dan Publik";
    
            }
    
        if($this->jam<"14:00"&& $this->umur>=20){
            $k=1;
        }else if($this->jam<"14:00"&&$this->umur<20){
            $k=0;
        }else if($this->jam>="14:00"&& $this->umur<20){
            $k=1;
        }
        else{
            $k=1;
        }
    
        
        if($k==1){
            $status="Boleh masuk";
        }else{
            
            $status="Tidak boleh masuk";
        
     }

     return [
        'nama'=>$this->nama,
        'umur'=>$this->umur,
        'kelamin'=>$this->kelamin,
        'jam'=>$this->jam,
        'bersama'=>$this->bersama,
        'status'=>$status,
        'ruang'=>$ruang,
        'catatan'=>$pasangan
     ];
    }
}
    $nama= $_POST['nama']??'';
    $umur= $_POST['umur']??'';
    $kelamin= $_POST['kelamin']??'';
    $jam= $_POST['jam']??'';
    $bersama= $_POST['bersamateman']??'';

    $mangacafe = new MangaCafe($nama, $umur,$kelamin, $jam, $bersama);
    $datanya = $mangacafe->ambilhasil();
// echo $jam;
  


    echo"<br>";
    echo"<br>";
    echo "<b>Nama:</b>". $datanya['nama']. "<br>";
    echo "<b>Usia:</b>". $datanya['umur']. "<br>";
    echo "<b>Jam:</b> ". $datanya['jam']. "<br>";
    echo "<b>Status:</b> ". $datanya['status']. "<br>";
    echo "<b>Ruang:</b> ". $datanya['ruang']. "<br>";
    echo "Catatan:". $datanya['catatan']. "<br>";
    


?>


