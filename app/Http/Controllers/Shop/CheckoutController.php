<?php

namespace App\Http\Controllers\Shop;

use PagarMe\Client;
use App\Models\Adress;
use App\Models\ShippMethod;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function preCheck()
    {
        $adress = Adress::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        $ship = ShippMethod::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
        return view('front.carrinho.finalizar-compra', compact('adress', 'ship'));
    }

    public function proccess()
    {
        return view('front.carrinho.efetuar-pagamento');
    }

    public function checkout(Request $request)
    {
        $pagarme = new Client('ak_test_RiK4hmGIp7sIB3PCClAEnKZwNPwxrm');

        $telefone = str_replace([' ', '-'], '', auth()->user()->whatsapp);

        $valor = number_format(\Cart::getTotal(), 2, '.', '');
        $valor = str_replace('.', '', $valor);
        $adress = Adress::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();

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
        if ($request->metodo == 'dinheiro') {
            return response()->json(['success'], 200);
        }
        $transaction = $pagarme->transactions()->create([
            'amount' =>  $valor,
            'payment_method' => 'credit_card',
            'card_holder_name' => $request->name,
            'card_cvv' => $request->cvv,
            'card_number' => $request->numero,
            'card_expiration_date' => $request->validade,
            'customer' => [
                'external_id' => (string)auth()->user()->id,
                'name' => auth()->user()->name,
                'type' => 'individual',
                'country' => 'br',
                'documents' => [
                    [
                        'type' => 'cpf',
                        'number' => $request->cpf
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
            return response()->json(['success'], 200);
        }
        return response()->json(['rejected'], 412);
    }
}
