<?php

namespace App\Http\Controllers\Location;

use App\Models\Unity;
use App\Models\Table;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function checkIn()
    {
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
        session(['mesa' => $request->mesa]);

        return response()->json('success', 200);
    }

    public function mesaHome()
    {
        $table = Table::where('code', session()->get('mesa'))->first();
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
}
