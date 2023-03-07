<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'month_receipt_id',
        'apartment_id',
        'water_bill',
        'electricity_bill',
        'service_fee',
        'rent',
        'total'
    ];
}
