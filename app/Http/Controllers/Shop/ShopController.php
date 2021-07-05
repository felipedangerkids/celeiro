<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $produtos = Product::all();
        return view('front.home.inicio', compact('produtos'));
    }

    public function single($id)
    {
        $produto = Product::find($id);
        return view('front.produto-single.produto-single', compact('produto'));
    }

    public function cervejas()
    {
        $produtos = Product::where('categoria', 'cerveja')->get();
        return view('front.produtos.cervejas.cervejas', compact('produtos'));
    }
    public function kits()
    {
        $produtos = Product::where('categoria', 'kit')->get();
        return view('front.produtos.kits.kits', compact('produtos'));
    }
    public function embutidos()
    {
        $produtos = Product::where('categoria', 'embutido')->get();
        return view('front.produtos.embutidos.embutidos', compact('produtos'));
    }
}
