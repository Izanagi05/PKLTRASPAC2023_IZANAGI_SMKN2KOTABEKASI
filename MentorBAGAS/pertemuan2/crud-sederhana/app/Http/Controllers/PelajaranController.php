<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelajaran;
// use  \Jurosh\PDFMerge\PDFMerger;


use Barryvdh\DomPDF\Facade\Pdf;


class PelajaranController extends Controller
{
    public function exportmerge(){
        // $pdf  =new PHPMERGE;
        try {

        $pdf=new \Jurosh\PDFMerge\PDFMerger;


    //     $pdf->addPDF('C:\Users\User\Downloads/tespel1.pdf', 'all','vertical')
    //     ->addPDF('C:\Users\User\Downloads/siswa_4.pdf', 'all', 'vertical') ;
    //    $pdf->merge('file', 'C:\Users\User\Downloads/file.pdf');
        $pdf->addPDF('datapelajaran/'.'pelajaran.pdf', 'all','vertical')
             ->addPDF('datasiswa/'.'siswa.pdf', 'all', 'vertical') ;
            $pdf->merge('file', 'file.pdf');

} catch (\Throwable $e) {
    return response()->json([
        'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
    ], 500);
}
    }
    public function exportpelajaran(){
        $data = Pelajaran::orderBy('nama_pelajaran')->get();
        $html ='<h1>Data Pelajaran dengan siswanya</h1>
        <table border="1">
        <tr>
        <td><h2> Nama Pelajaran</h2></td>
        <td><h2> Siswa yang Minat</h2></td>
        </tr>
        ';
         foreach ($data as $key => $mapel) {
            $html .= '<tr>';
            $html .= '<td>'.$mapel->nama_pelajaran.'</td>';
            $html .= '<td>';
            foreach ($mapel->Siswa as $key => $value) {
                # code...
                $html.=$value->nama.'<br>';
            }
            $html.='</td>';
            $html .= '</tr>';
        }
        '</table>';
        // $pdf =  loadView('siswa.pdf', $data);
        $pdf=Pdf::loadHTML($html);
         $pdfname = 'pelajaran.pdf';
        // return PDF::loadFile(public_path().$pdfname)->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
        $pdf->save(app()->basePath('public/datapelajaran/' . $pdfname));
        // rtrim(app()->basePath('public/' . $path), '/')
        return $pdf->download($pdfname);
    }
}
