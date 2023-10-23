<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Bisnis;
use App\Jobs\JobkuCsv;
use Illuminate\Http\Request;

class BisnisController extends Controller
{
    public function home(){
        // $data= Csv::paginate(10);
        return view('home.index',[
            'data'=>'tes',
        ]);
    }
    public function import( Request $request){
        set_time_limit(0);
         Bisnis::truncate();
        $file=$request->file('file');
        // $csvData =array_chunk($file, 1000);
        $csvData = file($file->getPathname());
        // $csvData = $file;
        $validasi=Validator::make($request->all(), [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        if($validasi->fails()){
            return [
                'message' => 'Gagal Import',
            ];
        }else{

            // dd($file);
            dispatch(new JobkuCsv($csvData));
            return redirect('/');
        }
    }
}



// public function import( Request $request){
//     Bisnis::truncate();
//    $file=$request->file('file');
//    $csvData = file($file->getPathname());
//    $validasi=Validator::make($request->all(), [
//        'file' => 'required|mimes:csv,xls,xlsx'
//    ]);

//    if($validasi->fails()){
//        return [
//            'message' => 'Gagal Import',
//        ];
//    }else{
//        foreach ($csvData as $dt) {
//            // dd($dt);
//            set_time_limit(0);
//            $row = str_getcsv($dt, ',');
//            // dd($row);
//            //     Bisnis::create([
//            //         'Variable' => $row[0],
//            //         'Breakdown' => $row[1],
//            //         'Breakdown_category' => $row[2],
//            //         'Year' => $row[3],
//            //         'RD_Value' => $row[4],
//            //         'Status' => $row[5],
//            //         'Unit' => $row[6],
//            //         'Footnotes' => $row[7],
//            //         'Relative_Sampling_Error' => $row[8]
//            // ]);
//            dispatch(new JobkuCsv($row));
//        }
//        return redirect('/');
//    }
// }
