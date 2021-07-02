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
}
