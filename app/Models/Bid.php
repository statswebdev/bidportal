<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'description_mv',
        'iulaan_number',
        'phone',
        'submission_date',
        'iulaan_pdf',
        'info_sheet_pdf',
        'spec_sheet_pdf',
        'supporting_docs',
    ];

    protected $casts = [
        'submission_date' => 'datetime',
    ];

    public function bidRegistrations()
    {
        return $this->hasMany(BidRegistration::class, 'bid_id');
    }
}
