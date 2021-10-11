<?php

namespace App\Http\Controllers\Painel;

use App\Models\Waiter;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class WaiterController extends Controller
{
    public function index()
    {
        $waiters = Waiter::all();
        return view('painel.settings.waiter.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $waiter['name'] = $request->name;
        $waiter['email'] = $request->email;
        $waiter['user'] = $request->user;
        $waiter['password'] = Hash::make($request->password);

        Waiter::create($waiter);

        return redirect()->back()->with('success', 'Garçom registrado com successo!');
    }

    public function edit($id)
    {
        $waiter = Waiter::find($id);
        return view('painel.settings.waiter.edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $waiter['name'] = $request->name;
        $waiter['email'] = $request->email;
        $waiter['user'] = $request->user;
        if($request->password) $waiter['password'] = Hash::make($request->password);

        Waiter::find($id)->update($waiter);

        return redirect()->route('setting.waiter')->with('success', 'Garçom alterado com successo!');
    }

    public function destroy(Request $request, $id)
    {
        Waiter::find($id)->delete();

        return response()->json('success', 200);
    }
}
