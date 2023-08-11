<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\Bisnis;

class BisnisImportC implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)


    {
        foreach ($rows as $row) {
            dd($row);

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
    }
    }
}
