<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'iulaan_number',
        'phone',
        'submission_date',
        'iulaan_pdf',
        'info_sheet_pdf',
    ];
}
