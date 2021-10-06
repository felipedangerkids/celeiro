<?php

namespace App\Http\Controllers\User;

use App\Models\Cliente;
use App\Models\Adress;
use App\Models\ShippMethod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function index()
    {
        $address = Adress::where('user_id', auth()->user()->id)->first();
        $ship = ShippMethod::where('user_id', auth()->user()->id)->max('id');
        $ship = ShippMethod::find($ship);
        return view('front.suas-preferencia.perfil', compact('address', 'ship'));
    }

    public function edit($id)
    {
        return view('front.suas-preferencia.atualizar-perfil');
    }

    public function update_photo(Request $request)
    {
        if($request->img_profile){
            $img = Image::make($request->img_profile);
            
            $name = Str::random() . '.jpg';
            
            $originalPath = storage_path('app/public/profile_path/');
            
            $img->save($originalPath . $name);
        }

        $user = Cliente::find(auth()->guard('cliente')->user()->id);
        if($request->img_profile) $user->profile_photo_path = $name;
        $user->save();

        return response()->json('success',200);
    }
}
