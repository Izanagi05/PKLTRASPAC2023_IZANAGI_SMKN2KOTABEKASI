<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function exportpdf(){
        $data = Siswa::orderBy('nama')->get();
        $html ='<h1>Data siswa</h1>
        <table border="1">
        <tr>
        <td><h2> Nama</h2></td>
        <td><h2> Nis</h2></td>
        <td><h2> Alamat</h2></td>
        <td><h2> Lahir</h2></td>
        </tr>
        ';
         foreach ($data as $key => $siswa) {
            $html .= '<tr>';
            $html .= '<td>'.$siswa->nama.'</td>';
            $html .= '<td>'.$siswa->nis.'</td>';
            $html .= '<td>'.$siswa->alamat.'</td>';
            $html .= '<td>'.$siswa->lahir.'</td>';

            $html .= '</tr>';
        }
        '</table>';
        // $pdf =  loadView('siswa.pdf', $data);
        $pdf=Pdf::loadHTML($html);
        return $pdf->download('siswa.pdf');
        // return $pdf->stream();
    }
    public function exportexcel(){

    }

    public function store(Request $request){
       try {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|unique:siswas',
            'alamat' => 'required|string',
            'lahir' => 'required|string',
            'kelas_id' => 'required|exists:kelass,kelas_id',
        ]);
        if($validator->fails()){


            return response()->json([
                'data' =>null,
                'message' => 'Gagal membuat',
                'success' => false
            ]);
        }else{
            $post= Siswa::create($request->all());


            return response()->json([
                'data' =>$post,
                'message' => 'Berhasil membuat',
                'success' => true
            ]);

        }
       } catch (\Throwable $e) {
        return response()->json([
            'data' => null,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            'success' => false
        ], 500);
       }
    }
    public function update(Request $request){
try {

    $data = Siswa::findOrFail($request->siswa_id);
    $data->makeHidden('siswa_id');
    $validator = Validator::make($request->all(), [
        'nama' => 'required|string|max:255',
        'nis' => 'required|string',
        'alamat' => 'required|string',
        'lahir' => 'required|string',
        'kelas_id' => 'required|exists:kelass,kelas_id',
    ]);

        if($validator->fails()){


            return response()->json([
                'data' =>null,
                'message' => 'Gagal membuat',
                'success' => false
            ]);
        }else{
            $data->update($request->all());


            return response()->json([
                'data' =>$data,
                'message' => 'Berhasil membuat',
                'success' => true
            ]);

        }

    } catch (\Throwable $e) {
        return response()->json([
            'data' => null,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            'success' => false
        ], 500);
    }
    }

    public function delete($id){
try {
    $data = Siswa::findOrFail($id);

    $data->delete();

    return response()->json([
        'message'=>'berhasil hapus',
        'success'=>true
    ]);

} catch (\Throwable $e) {
    //throw $th;
    return response()->json([
        'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
        'success' => false
    ], 500);
}


    }


}
