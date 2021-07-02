<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function preCheck()
    {
        return view('front.carrinho.finalizar-compra');
    }
}
