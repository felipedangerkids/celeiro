<?php

namespace App\Http\Controllers;

use PagarMe\Client;
use App\Models\Pedido;
use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('pedidos')->get();
        dd($pedidos);
    }
}
