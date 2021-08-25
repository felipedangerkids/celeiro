<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    use HasFactory;

    protected $table = 'bairros';

    public function logradouros()
    {
        return $this->hasMany(Bairro::class, 'bairro_id', 'bairro_id');
    }
}
