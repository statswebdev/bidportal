<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'bid_id',
        'type',
        'full_name',
        'email',
        'phone', 
        'company_name',
        'company_registration_number',
    ];

    public function bid()
    {
        return $this->belongsTo(Bid::class, 'bid_id');
    }
}
