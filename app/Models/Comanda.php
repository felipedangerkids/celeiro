<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'waiter_id',
        'waiter_status',
        'table_code',
        'total_value',
        'replace',
        'payment_method',
        'installments',
        'troco',
        'status',
    ];
}
