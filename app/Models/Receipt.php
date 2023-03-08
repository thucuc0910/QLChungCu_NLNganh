<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Receipt extends Model
{

    use HasApiTokens, HasFactory, Notifiable;


    public $timestamps = false;

    protected $fillable = [
        'month_receipt_id',
        'apartment_id',
        'water_bill',
        'electricity_bill',
        'service_fee',
        'rent',
        'total',
        'status'
    ];
}
