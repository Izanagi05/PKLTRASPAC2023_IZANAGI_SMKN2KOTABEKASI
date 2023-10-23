<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bisnis extends Model
{
    use HasFactory;
    protected $primaryKey='bisnis_id';
    protected $fillable=['Variable', 'Breakdown', 'Breakdown_category', 'Year', 'RD_Value', 'Status', 'Unit', 'Footnotes', 'Relative_Sampling_Error'];
}
