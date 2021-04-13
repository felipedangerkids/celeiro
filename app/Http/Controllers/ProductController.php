<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);
        return view('painel.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        // $price = str_replace(['.', ','], ['', '.'], $data['price']);
        $img = ImageManagerStatic::make($data['image']);

        $name = Str::random() . '.jpg';

        $originalPath = storage_path('app/public/produtos/');

        $img->save($originalPath . $name);

        $sellprice = str_replace(['.', ','], ['', '.'], $data['sellprice']);
        $buyprice = str_replace(['.', ','], ['', '.'], $data['buyprice']);
    

        $product = Product::create([

            'name' => $data['name'], 
            'resume' => $data['resume'], 
            'provider' => $data['provider'], 
            'provphone' => $data['provphone'], 
            'provname' => $data['provname'], 
            'buyprice' => $buyprice, 
            'sellprice' => $sellprice, 
            'bitterness' => $data['bitterness'], 
            'temperature' => $data['temperature'], 
            'ibv' => $data['ibv'], 
            'type' => $data['type'], 
            'image' => $name, 
            'description' => $data['description'], 
            'spotlight' => $data['spotlight'], 
       
  
        ]);

        return redirect()->back()->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $product = Product::find($id);
        return view('painel.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $produto = Product::find($id);

        $data = $request->all();

        if ($request->logo != '') {
            $path = storage_path('app/public/produtos/');

            //code for remove old file
            if ($produto->logo != ''  && $produto->logo != null) {
                $file_old = $path . $produto->logo;
                unlink($file_old);
            }

            //upload new file
            $img = ImageManagerStatic::make($data['logo']);


            $name = Str::random() . '.jpg';

            $originalPath = storage_path('app/public/produtos/');

            $img->save($originalPath . $name);

            //for update in table
            $produto->update(['image' => $name]);
        }


        $sellprice = str_replace(['.', ','], ['', '.'], $data['sellprice']);
        $buyprice = str_replace(['.', ','], ['', '.'], $data['buyprice']);

        $produto->name =     $request->get('name');
        $produto->resume = $request->get('resume');
        $produto->provider = $request->get('provider');
        $produto->provphone = $request->get('provphone');
        $produto->provname = $request->get('provname');
        $produto->buyprice =  $buyprice ;
        $produto->sellprice = $sellprice;
        $produto->bitterness = $request->get('bitterness');
        $produto->temperature = $request->get('temperature');
        $produto->temperature = $request->get('temperature');
        $produto->ibv = $request->get('ibv');
        $produto->type = $request->get('type');
        $produto->description = $request->get('description');
        $produto->spotlight = $request->get('spotlight');
        $produto->save();

        

        return redirect()->route('products')->with('success', 'Produto alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('success', 'Produto deletado com sucesso!'); 
    }
}
