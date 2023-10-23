<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function cobaget(){
        $searchTerm="Megawati";
        $pathpy  = base_path('engine/beritaku.py');
$output = shell_exec("python $pathpy \"$searchTerm\"");
// $output = str_replace("", "", $output);
// $output = array_map()
 return response()->json(['data'=>$output]);
    }
}
