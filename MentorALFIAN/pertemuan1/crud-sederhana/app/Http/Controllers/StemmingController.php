<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \Sastrawi\Stemmer\StemmerFactory;

class StemmingController extends Controller
{
    public function stemming()
    {

        $teksawal = 'Berkendara di tengah kepadatan lalu lintas dan jalan yang sempit di kota besar bisa menjadi pengalaman yang menegangkan. Dalam kondisi seperti ini, kemampuan mengelola emosi dan tetap tenang menjadi sangat penting. Meskipun terkadang terjadi kemacetan yang tidak terduga, perencanaan rute dan penggunaan aplikasi navigasi dapat membantu menghindari jalur-jalur padat. Selain itu, perilaku pengemudi lainnya juga dapat mempengaruhi kenyamanan berkendara. Sebagai pengemudi yang bertanggung jawab, kita perlu menjaga keselamatan diri dan orang lain di jalan. mengaku kekalahannya';
        $stemmerFactory = new StemmerFactory();
        $stemmer  = $stemmerFactory->createStemmer();
        $output   = $stemmer->stem($teksawal);
        // echo $stemmer->stem('Mereka meniru-nirukannya') . "\n";

        return response()->json([
            'data' => $output,
        ], 200);
    }
}

 // $stoplist=["yang", "juga", "dari", "dia", "kami", "kamu" , "ini", "itu", "atau", "dan", "tersebut", "dengan", "adalah", "yaitu"];
        // $result = strtolower(trim($teksawal));

        // $result=preg_replace("/[^a-z.]/",' ', $result);
        // $result=str_replace('. ', ' ', $result);
        // foreach ($stoplist as $key => $value) {
        //     $result=str_replace($stoplist[$key], '',$result);
        //     # code...
        // }
        // $arrayResult = explode(' ', $result);


        // $arrayResult= array_map(function($item){
        //     if(
        //         substr($item, 0,2) =='ke' && substr($item, -2) =='an' ||
        //         substr($item, 0,2) =='pe' && substr($item, -2) =='an'
        //         // substr($item, 0,2) =='men'
        //         ){
        //             return substr($item, 2, strlen($item) - 4);
        //     }else{
        //         return $item;
        //     }
        // },$arrayResult);
        // $result2 =implode(' ', $arrayResult);

        // dd($result2);
        // $arrayResult = explode(' ', $result);
//  echo $result;
