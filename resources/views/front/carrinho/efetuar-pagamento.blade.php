@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>EFETUAR <br> PAGAMENTO</h1>
        </div>
        <div class="linha" id="linha-horizontal">

        </div>

        <form id="form-checkout">
            <div class="profile mt-5">
                <div class="d-flex">
                    <div>
                        <div class="icones-back">
                            <div class="text-center">
                                <div class="icon-img">
                                    <img src="{{ url('assets/img/card.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="check-in" for="primeiro">Pagar com cartão
                        <input name="metodo" value="card" id="primeiro" type="radio">
                        <span class="check"></span>
                    </label>
                </div>
                <div class="mt-5" id="linha-horizontal"></div>
            </div>
            <div id="card" class="container d-none">
                <div class="row justify-content-between my-4 mx-3">
                    <div class="form-group col-12 my-2">
                        <label class="text-white" for="">Numero do Cartão</label>

                        <input type="text" name="numero" id="numero" class="form-control req">
                    </div>
                    <div class="form-group col-12 my-2">
                        <label class="text-white" for="">Nome do Titular</label>
                        <input type="text" name="name" class="form-control req">
                    </div>
                    <div class="form-group col-5 my-2">
                        <label class="text-white" for="">Validade</label>
                        <input type="text" name="validade" id="validade" class="form-control req">
                    </div>
                    <div class="form-group col-5 my-2">
                        <label class="text-white" for="">CVV</label>
                        <input type="text" name="cvv" id="cvv" class="form-control req">
                    </div>
                    <div class="form-group col-12 my-2">
                        <label class="text-white" for="">CPF do Titular</label>
                        <input type="text" name="cpf" id="cpf" class="form-control req">

                    </div>
                </div>
            </div>
            <div class="profile mt-5">
                <div class="d-flex">
                    <div>
                        <div class="icones-back">
                            <div class="text-center">
                                <div class="icon-img">
                                    <img src="{{ url('assets/img/dinheiro.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="check-in" for="segundo">Pagar com dinheiro
                        <input class="form-check-input" value="dinheiro" name="metodo" id="segundo" type="radio">
                        <span class="check"></span>
                    </label>
                </div>
                <div class="mt-5" id="linha-horizontal"></div>
            </div>
            <div id="money" class="container d-none">
                <div class="row justify-content-between my-4 mx-3">
                    <div class="form-group col-12 my-2">
                        <label class="text-white" for="">Troco Para:</label>
                        <input type="text" name="troco" id="dinheiro" class="form-control">
                    </div>

                </div>
            </div>
            <div class="profile mt-5">
                <div class="row">
                    @foreach (\Cart::getContent() as $item)


                        <div class="col-4 my-2">
                            <div class="fundo-branco">
                                <div class="text-center">
                                    <div class="lata">
                                        <a href="#">
                                            <img style="width: 100%; object-fit: cover;"
                                                src="{{ url('storage/produtos/' . $item->attributes->image) }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="title col-6 my-2">
                            <div class="nome_">
                                <span>{{ $item->name }} <br> {{ $item->attributes->resume }}</span> <br>
                            </div>
                            <div class="unid">
                                <span>{{ $item->quantity }} UNID</span> <br>
                            </div>
                            <div class="preco">
                                <h2>{{ 'R$ ' . number_format($item->price, 2, ',', '.') }} </h2> <br>
                            </div>
                        </div>
                        <div class="d-block col-2">
                            <div class="edit">
                                <button class="btn btn-edit">
                                    <img src="{{ url('assets/img/edit.png') }}" alt="">
                                </button>
                            </div>
                            <div class="edit mt-5">
                                <a href="{{ route('cart.remove', $item->id) }}"><button type="button"
                                        class="btn btn-lixeira">
                                        <img src="{{ url('assets/img/lixeira.png') }}" alt=""></button></a>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="mt-5" id="linha-horizontal"></div>
            </div>
            <div class="profile mt-5">
                <div class="row">
                    <div class="col-6 my-2 mb-3">
                        <div class="spans text-center"><div class="nome"><span>Valor de Entrega</span></div></div>
                        <div class="spans text-center"><div class="email"><span>R$ {{number_format($transporte->valor_frete, 2, ',', '.')}}</span></div></div>
                    </div>
                    <div class="col-6 my-2 mb-3">
                        <div class="spans text-center"><div class="nome"><span>Tempo de Entrega</span></div></div>
                        <div class="spans text-center"><div class="email"><span>{{$transporte->tempo_entrega}} Dias</span></div></div>
                    </div>
                </div>
                <div class="mt-3" id="linha-horizontal"></div>
                <div class="d-flex mt-5 justify-content-center">
                    <div>
                        <div class="icones-back text-white text-center">
                            <h5>Total do Pedido: {{  'R$ '.number_format(Cart::getTotal(), 2, ',', '.') }}  </h5>

                            <h5>Total a Pagar: {{  'R$ '.number_format((Cart::getTotal()+($transporte->valor_frete ?? 0)), 2, ',', '.') }}  </h5>
                        </div>
                    </div>
                </div>
                <div class="mt-5" id="linha-horizontal"></div>
            </div>
            <div class="text-center my-5">
                <button type="button" id="enviar" class="btn btn-adicionar">PAGAR E FINALIZAR</button>
            </div>
        </form>
    </div>

@endsection
