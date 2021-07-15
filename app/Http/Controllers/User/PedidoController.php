<?php

namespace App\Http\Controllers\User;

use App\Models\Item;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::where('user_id', auth()->user()->id)->get();
        $items = Item::where('user_id' , auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('front.user.pedidos', compact('pedidos', 'items'));

    }
}
