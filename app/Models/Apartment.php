<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Apartment extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;


    protected $fillable = [
        'code',
        'floor',
        'length',
        'width',
        'direction',
        'status',
        'description',
        'price',

    ];
}
