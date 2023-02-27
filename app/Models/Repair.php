<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'apartment_id',
        'resident_id',
        'name',
        'content',
        'date',
        'status',
    ];
}
