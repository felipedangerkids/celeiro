<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'adress_id',
        'produto_id',
        'pagamento',
        'troco',
        'ship_id',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function adress()
    {
        return $this->belongsTo(Adress::class, 'adress_id');
    }
    public function pedidos()
    {
        return $this->hasMany(Item::class);
    }
}