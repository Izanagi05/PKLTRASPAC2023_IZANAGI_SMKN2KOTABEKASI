<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use Illuminate\Http\Request;
use App\Imports\BisnisImport;
use App\Imports\BisnisImportC;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
class BisnisCotroller extends Controller
{

    public function index(){

        $data= Bisnis::paginate(10);

        return view('home.home',[
            'databisnis'=>$data,
        ]);
    }

    public function importExcel(Request $request){
        //atasi Maximum execution time of 60 seconds exceeded error
        set_time_limit(0);

        Bisnis::truncate();
        $file=$request->file('file');
        $csvData = file($file->getPathname());
        // $csvData =$file->getPathname();

        $validasi=Validator::make($request->all(), [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        if($validasi->fails()){
            return [
                'message' => 'Gagal Import',
            ];
        }else{
        foreach ($csvData as $line) {
            $row = str_getcsv($line, ',');
            // dd($row);
                Bisnis::create([
                    'series_reference' => $row[0],
                    'period' => $row[1],
                    'data_value' => $row[2],
                    'suppressed' => $row[3],
                    'status' => $row[4],
                    'units' => $row[5],
                    'magnitude' => $row[6],
                    'subject' => $row[7],
                    'group' => $row[8],
                    'series_title_1' => $row[9],
                    'series_title_2' => $row[10],
                    'series_title_3' => $row[11],
                    'series_title_4' => $row[12],
                    'series_title_5' => $row[13],
                ]);
            // }
        }
        return redirect('/home');
        }

    }
}


        // $validasi=Validator::make($request->all(), [
        //     'file' => 'required|mimes:csv,xls,xlsx'
        // ]);

        // if($validasi->fails()){
        //     return [
        //         'message' => 'Gagal Import',
        //     ];
        // }else{
        //     $nama_file = $file->getClientOriginalName();
        //     Excel::import(new BisnisImport(), $file);



// $file->move('csvku/hasilimport',$nama_file);
                // $path = $file->getRealPath();
                // $data = Excel::import($path)
            // import data
            // public_path('/csvku/hasilimport'.$nama_file);
            // // dd($path);
            // public_path('/csvku/hasilimport/datacsvku.csv')




               // ini_set('max_execution_time', 600);
        // set_time_limit(0);
        // $file=$request->file('file');
        // $validasi=Validator::make($request->all(), [
        //     'file' => 'required|mimes:csv,xls,xlsx'
        // ]);

        // if($validasi->fails()){
        //     return [
        //         'message' => 'Gagal Import',
        //     ];
        // }else{
        //     $nama_file = $file->getClientOriginalName();
		//     Excel::import(new BisnisImport(), $file);
        //     return redirect('/home');

        // }
