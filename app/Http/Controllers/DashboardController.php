<?php

namespace App\Http\Controllers;

use App\Models\Captura;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $capturas =  Captura::paginate(10);
        return view('dashboard', compact('capturas'));
    }
}
