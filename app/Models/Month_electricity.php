<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month_electricity extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'month_id',
        'year_id',
        'total',
    ];
}
