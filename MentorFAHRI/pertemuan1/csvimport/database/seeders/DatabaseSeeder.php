<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bisnis;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Bisnis::truncate();
        $csvData = fopen(base_path('public/csvku/databisnis.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Bisnis::create([
                    'Series_reference' => $data[0],
                    'Period' => $data[1],
                    'Data_value' => $data[2],
                    'Suppressed' => $data[3],
                    'STATUS' => $data[4],
                    'UNITS' => $data[5],
                    'Magnitude' => $data[6],
                    'Subject' => $data[7],
                    'Group' => $data[8],
                    'Series_title_1' => $data[9],
                    'Series_title_2' => $data[10],
                    'Series_title_3' => $data[11],
                    'Series_title_4' => $data[12],
                    'Series_title_5' => $data[13],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
