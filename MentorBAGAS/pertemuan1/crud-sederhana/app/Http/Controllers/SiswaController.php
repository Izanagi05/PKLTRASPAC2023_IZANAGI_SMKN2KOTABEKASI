<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

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
        $data = Siswa::orderBy('nama')->get();



        $spreadsheet = new Spreadsheet();
        $sheet= $spreadsheet->getActiveSheet();
        $tableHead=[
            'font'=>[
                'color'=>[
                    'rgb'=>'FFFFFF'
                    ],
                ],
                'fill'=>[
                    'fillType'=>Fill::FILL_SOLID,
                    'startColor'=>[
                        'rgb'=>'538ED5'
                    ]

                ],
                ];
        $evenRow=[
            'fill'=>[
                'fillType'=>Fill::FILL_SOLID,
                'startColor'=>[
                    'rgb'=>'00BDFF'
                    ]
                ],
        ];
        $oddRow=[
            'fill'=>[
                'fillType'=>Fill::FILL_SOLID,
                'startColor'=>[
                    'rgb'=>'00EAFF'
                    ]
                ],
        ];

        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial')->setSize(12); //set style font default
        $spreadsheet->getActiveSheet()->setCellValue('A1', 'Data Siswa');
        $spreadsheet->getActiveSheet()->mergeCells("A1:F1"); //ubah width>>>dari a1 - d1 buat judul

        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);//style judul
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $sheet->setCellValue('A2', "ID");
        $sheet->setCellValue('B2', "Nama");
        $sheet->setCellValue('C2', "NIS");
        $sheet->setCellValue('D2', "Alamat");
        $sheet->setCellValue('E2', "Tanggal Lahir");
        $sheet->setCellValue('F2', "Kelas");
        $row = 3;

        //STYLE TEXT TIAP CELL BAWAH JUDUL
        $spreadsheet->getActiveSheet()->getStyle('A2:F2')->getFont()->setSize(12);
        $spreadsheet->getActiveSheet()->getStyle('A2:F2')->getFont()->setBold(true);

        //loop datanya
        $spreadsheet->getActiveSheet()->getStyle('A2:F2')->applyFromArray($tableHead);
        foreach ($data as $siswa) {
            $sheet->setCellValue('A' . $row, $siswa->siswa_id);
            $sheet->setCellValue('B' . $row, $siswa->nama);
            $sheet->setCellValue('C' . $row, $siswa->nis);
            $sheet->setCellValue('D' . $row, $siswa->alamat);
            $sheet->setCellValue('E' . $row, $siswa->lahir);
            $sheet->setCellValue('F' . $row, $siswa->Kelas->nama_kelas);

            //style backgroundnya ambil dari event&odd row
            $rowStyle = ($row % 2 == 0) ? $evenRow : $oddRow;
            $spreadsheet->getActiveSheet()->getStyle('A' . $row . ':F' . $row)->applyFromArray($rowStyle);


            // Set alignment pada seluruh data
            $spreadsheet->getActiveSheet()->getStyle('A' . $row . ':F' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

            $row++;
        }
        $writer = new Xlsx($spreadsheet);

        // Menyimpan hasil spreadsheet ke dalam file
        $filename = 'data_siswa.xlsx';
        $writer->save($filename);
        return response()->download($filename);

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
