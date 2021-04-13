<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'resume',
        'provider',
        'provphone',
        'provname',
        'buyprice',
        'sellprice',
        'bitterness',
        'temperature',
        'ibv',
        'type',
        'image',
        'description',
        'spotlight',
        'status',
    ];
}
