<?php

namespace App\Http\Controllers\Location;

use App\Models\Unity;
use App\Models\Table;
use App\Models\Product;
use App\Models\Comanda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function checkIn()
    {
        $comanda = Comanda::where('client_id', auth()->guard('cliente')->user()->id)->where('status', 1)->get();
        if($comanda->count() > 0) return redirect()->route('mesa.home');

        $unities = Unity::all();
        return view('location.checkIn', get_defined_vars());
    }

    public function mesa($unidade)
    {
        $tables = Table::where('unity_id', $unidade)->get();
        return view('location.mesa', get_defined_vars());
    }

    public function gerarComanda(Request $request)
    {
        Comanda::create([
            'client_id' => auth()->guard('cliente')->user()->id,
            'table_code' => $request->mesa,
        ]);


        return response()->json('success', 200);
    }

    public function mesaHome()
    {
        $comanda = Comanda::where('client_id', auth()->guard('cliente')->user()->id)->first();
        if(empty($comanda)) return redirect()->route('home');

        $table = Table::where('code', $comanda->table_code)->first();
        return view('location.mesaHome', get_defined_vars());
    }

    public function catalogo($slug)
    {
        $products = Product::where('categoria', str_replace('s','', $slug))->where('stock', '>', 0)->where('location', 1)->get();
        return view('location.catalogo', get_defined_vars());
    }

    public function produto($slug)
    {
        $product = Product::where('slug', $slug)->where('stock', '>', 0)->where('location', 1)->first();
        if(empty($product)) return redirect()->route('mesa.home');

        return view('location.produto', get_defined_vars());
    }

    public function comanda()
    {
        $table = Table::where('code', session()->get('mesa'))->first();
        return view('location.comanda', get_defined_vars());
    }

    public function comandaConfirma()
    {
        $table = Table::where('code', session()->get('mesa'))->first();
        return view('location.comandaConfirma', get_defined_vars());
    }

    public function comandaCheckout()
    {
        return view('location.comandaCheckout', get_defined_vars());
    }
}
