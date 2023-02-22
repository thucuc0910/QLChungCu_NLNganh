<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Staff extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'admin_id',
        'name',
        'phone',
        'CMND',
        'gender',
        'birthday',
        'position',
        'city',
        'district',	
        'ward',	
    ];
}
