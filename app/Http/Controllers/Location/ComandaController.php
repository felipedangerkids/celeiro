<?php

namespace App\Http\Controllers\Location;

use App\Models\Unity;
use App\Models\Table;
use App\Models\Product;
use App\Models\Comanda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComandaController extends Controller
{
    public function comanda()
    {
        $comanda = Comanda::with('table', 'products.product')->where('client_id', auth()->guard('cliente')->user()->id)->where('status', 1)->first();

        return view('location.comanda', get_defined_vars());
    }

    public function comandaConfirma()
    {
        $comanda = Comanda::with('table', 'products.product')->where('client_id', auth()->guard('cliente')->user()->id)->where('status', 1)->first();
        return view('location.comandaConfirma', get_defined_vars());
    }

    public function comandaCheckout()
    {
        return view('location.comandaCheckout', get_defined_vars());
    }
}
