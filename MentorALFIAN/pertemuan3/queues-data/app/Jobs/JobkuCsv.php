<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Validator;
use App\Models\Bisnis;

class JobkuCsv implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $dataku;
    public function __construct($datacsv)
    {
        $this->dataku=$datacsv;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $csvData= $this->dataku;
        foreach ($csvData as $dt) {
            set_time_limit(0);
            $row = str_getcsv($dt, ',');
                Bisnis::create([
                    'Variable' => $row[0],
                    'Breakdown' => $row[1],
                    'Breakdown_category' => $row[2],
                    'Year' => $row[3],
                    'RD_Value' => $row[4],
                    'Status' => $row[5],
                    'Unit' => $row[6],
                    'Footnotes' => $row[7],
                    'Relative_Sampling_Error' => $row[8]
            ]);


    }
    }
}
