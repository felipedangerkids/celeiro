<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'cidades';

    public function bairros()
    {
        return $this->hasMany(Bairro::class, 'cidade_id', 'cidade_id');
    }
}
