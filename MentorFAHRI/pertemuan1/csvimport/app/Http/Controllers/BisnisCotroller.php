<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use Illuminate\Http\Request;
use App\Imports\BisnisImport;
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

        $file=$request->file('file');
        $validasi=Validator::make($request->all(), [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        if($validasi->fails()){
            return [
                'message' => 'Gagal Import',
            ];
        }else{
            $nama_file = $file->getClientOriginalName();

		    $file->move('csvku/hasilimport',$nama_file);

		// import data
        // dd(new BisnisImport);
		    Excel::import(new BisnisImport(), public_path('/csvku/hasilimport'.$nama_file));
            return redirect('/home');

        }

    }
}
