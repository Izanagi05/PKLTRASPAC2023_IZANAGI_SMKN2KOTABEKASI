<?php

namespace App\Imports;

use App\Models\Bisnis;
use Maatwebsite\Excel\Concerns\ToModel;

class BisnisImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Bisnis([
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

// 'series_reference' => $row['series_reference'],
// 'period' => $row['Period'],
// 'data_value' => $row['Data_value'],
// 'suppressed' => $row['Suppressed'],
// 'status' => $row['STATUS'],
// 'units' => $row['UNITS'],
// 'magnitude' => $row['Magnitude'],
// 'subject' => $row['Subject'],
// 'group' => $row['Group'],
// 'series_title_1' => $row['Series_title_1'],
// 'series_title_2' => $row['Series_title_2'],
// 'series_title_3' => $row['Series_title_3'],
// 'series_title_4' => $row['Series_title_4'],
// 'series_title_5' => $row['Series_title_5'],
