<?php

namespace App\Http\Controllers;

use App\Models\Captura;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('painel.index');
    }

    public function clientes()
    {
        $capturas =  Captura::paginate(10);
        return view('painel.clientes', compact('capturas'));
    }
}
