<?php

namespace App\Http\Controllers\Painel;

use App\Models\Item;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PainelController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('users', 'adress')->get();
        return view('painel.pedidos.index', compact('pedidos'));
    }

    public function ver($id)
    {
        $items = Item::where('pedido_id', $id)->get();
        $pedido = Pedido::with('users', 'adress', 'ship')->find($id);
        return view('painel.pedidos.ver', compact('pedido', 'items'));
    }
}
