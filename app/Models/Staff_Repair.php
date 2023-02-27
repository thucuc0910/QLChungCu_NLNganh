<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff_Repair extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'staff_id',
        'repair_id',
        'date',
    ];
}
