<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Adress;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function preCheck()
    {
        $adress = Adress::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        return view('front.carrinho.finalizar-compra', compact('adress'));
    }
}
