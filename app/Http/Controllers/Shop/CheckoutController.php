<?php

namespace App\Http\Controllers\Shop;

use PagarMe\Client;
use App\Models\Item;
use App\Models\Adress;
use App\Models\Pedido;
use App\Models\Transporte;
use App\Models\ShippMethod;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function preCheck()
    {
        $adress = Adress::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        if($adress){
            $transporte = Transporte::where('estado', $adress->estado)->where('cidade', $adress->cidade)->where('bairro', 'like', '%'.$adress->bairro.'%')->first();
        }else{
            $transporte = '';
        }
        $ship = ShippMethod::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        return view('front.carrinho.finalizar-compra', compact('adress', 'ship', 'transporte'));
    }

    public function proccess()
    {
        $adress = Adress::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        $transporte = Transporte::where('estado', ($adress->estado ?? ''))->where('cidade', ($adress->cidade ?? ''))->where('bairro', 'like', '%'.($adress->bairro ?? '').'%')->first();
        return view('front.carrinho.efetuar-pagamento', compact('transporte'));
    }

    public function checkout(Request $request)
    {
        $pagarme = new Client('ak_live_3JqrpLWWF1I18UEdu2YBy0lFNcStp2');

        $telefone = str_replace([' ', '-'], '', auth()->user()->whatsapp);

        $adress = Adress::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        $transporte = Transporte::where('estado', $adress->estado)->where('cidade', $adress->cidade)->where('bairro', 'like', '%'.$adress->bairro.'%')->first();

        $valor = number_format((\Cart::getTotal()+($transporte->valor_frete ?? 0)), 2, '.', '');
        $valor = str_replace('.', '', $valor);
        $ship = ShippMethod::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        $validade = str_replace('/', '', $request->validade);

        $items = [];
        foreach (\Cart::getContent() as $key => $value) {

            $items[] = [
                'id' => (string)$value->id,
                'title' => $value->name,
                'unit_price' => (str_replace('.', '', number_format($value->price, 2, '.', ''))),
                'quantity' => (int)$value->quantity,
                'tangible' => true
            ];
        }


        $pedido = Pedido::create([
            'user_id' => auth()->user()->id,
            'adress_id' => $adress->id,
            'produto_id' => 1,
            'pagamento' => $request->metodo,
            'troco' => $request->troco,
            'ship_id' => $ship->id,
            'valor_frete' => $ship->tipo == 'Receber em Casa' ? $transporte->valor_frete : null,
            'tempo_entrega' => $ship->tipo == 'Receber em Casa' ? $transporte->tempo_entrega : null,
        ]);

        foreach (\Cart::getContent() as $key => $value) {

            $items[] = [
                'id' => (string)$value->id,
                'title' => $value->name,
                'unit_price' => (str_replace('.', '', number_format($value->price, 2, '.', ''))),
                'quantity' => (int)$value->quantity,
                'tangible' => true
            ];

            $produtos = Item::create([
                'user_id' => auth()->user()->id,
                'pedido_id' => $pedido->id,
                'title' => $value->name,
                'unit_price' => $value->price,
                'quantity' => $value->quantity,
            ]);
        }


        if ($request->metodo == 'dinheiro') {
            \Cart::clear();
            return response()->json(['success'], 200);
        }

        $cpf = str_replace(['.', '-',], '', $request->cpf);

        $transaction = $pagarme->transactions()->create([
            'amount' =>  $valor,
            'payment_method' => 'credit_card',
            'card_holder_name' => $request->name,
            'card_cvv' => $request->cvv,
            'card_number' => $request->numero,
            'card_expiration_date' =>  $validade,
            'customer' => [
                'external_id' => (string)auth()->user()->id,
                'name' => auth()->user()->name,
                'type' => 'individual',
                'country' => 'br',
                'documents' => [
                    [
                        'type' => 'cpf',
                        'number' => $cpf
                    ]
                ],
                'phone_numbers' => ['+55' . $telefone],
                'email' => auth()->user()->email
            ],
            'billing' => [
                'name' => auth()->user()->name,
                'address' => [
                    'country' => 'br',
                    'street' => $adress->endereco,
                    'street_number' => (string)$adress->numero,
                    'state' => $adress->estado,
                    'city' => $adress->cidade,
                    'neighborhood' => $adress->bairro,
                    'zipcode' => $adress->cep
                ]
            ],
            'shipping' => [
                'name' => auth()->user()->name,
                'fee' => 1020,
                'delivery_date' => '2018-09-22',
                'expedited' => false,
                'address' => [
                    'country' => 'br',
                    'street' => $adress->endereco,
                    'street_number' => (string)$adress->numero,
                    'state' => $adress->estado,
                    'city' => $adress->cidade,
                    'neighborhood' => $adress->bairro,
                    'zipcode' => $adress->cep
                ]
            ],
            'items' =>
            $items




        ]);
        if ($transaction->status == 'paid') {
            \Cart::clear();
            return response()->json(['success'], 200);
        }
        return response()->json($transaction->status, 412);
    }
}
