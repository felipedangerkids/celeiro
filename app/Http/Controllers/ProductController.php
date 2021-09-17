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
        if(!empty($_GET['name'])){
            switch($_GET['coluna']){
                case 'produto':
                    $products = Product::where('name', 'like', '%'.$_GET['name'].'%')->paginate(15);
                break;
                case 'fornecedor':
                    $products = Product::where('provider', 'like', '%'.$_GET['name'].'%')->paginate(15);
                break;
                case 'contato':
                    $products = Product::where('provname', 'like', '%'.$_GET['name'].'%')->paginate(15);
                break;
            }
        }else{
            $products = Product::paginate(15);
        }
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
        $rules = [
            'name' => 'required|min:3|max:255',
            'buyprice' => 'required',
            'sellprice' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ];

        $customMessages = [
            'name.required' => 'O campo Nome é obrigatório!',
            'name.min' => 'O campo Nome precisa no minimo 3 caracteres',
            'name.max' => 'O campo Nome excede o numero de caracteres',
            'buyprice.required' => 'O campo preço de compra e obrigatório!',
            'sellprice.required' => 'O campo preço de venda e obrigatório!',
            'image.required' => 'O campo imagem do produto e obrigatório!',
            'image.mimes' => 'Formato de imagem não aceito! por favor coloque jpeg, jpg, png ou svg',
            'image.max' => 'Imagem excede limite de tamanho',
        ];

        $this->validate($request, $rules, $customMessages);


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
            'categoria' => $data['categoria'],
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

        if ($request->image != '') {
            $path = storage_path('app/public/produtos/');

            //code for remove old file
            if ($produto->image != ''  && $produto->image != null) {
                $file_old = $path . $produto->image;
                unlink($file_old);
            }

            //upload new file
            $img = ImageManagerStatic::make($data['image']);


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
        $produto->buyprice =  $buyprice;
        $produto->sellprice = $sellprice;
        $produto->bitterness = $request->get('bitterness');
        $produto->temperature = $request->get('temperature');
        $produto->temperature = $request->get('temperature');
        $produto->ibv = $request->get('ibv');
        $produto->type = $request->get('type');
        $produto->categoria = $request->get('categoria');
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
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {

            $user = Product::findOrFail($id);

            if ($user) {

                $user->delete();

                return response()->json(array('success' => true));
            }
        }
    }
}
