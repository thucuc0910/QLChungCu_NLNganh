<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentService extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'service_id',
        'date_start',
        'date_end',

    ];
}
