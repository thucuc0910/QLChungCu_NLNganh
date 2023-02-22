<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'water_electric_id',
        'apartment_id',
        'old',
        'new',
    ];
}
