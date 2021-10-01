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
                    <div class="form-group col-4 my-2">
                        <label class="text-white" for="">Mês</label>
                        <select name="mes" class="form-control" id="">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        {{-- <input type="text" name="mes" id="validade" class="form-control req"> --}}
                    </div>
                    <div class="form-group col-4 my-2">
                        <label class="text-white" for="">Ano</label>
                        <select name="ano" class="form-control" id="">
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                            <option value="2032">2032</option>
                        </select>
                    </div>
                    <div class="form-group col-4 my-2">
                        <label class="text-white" for="">CVV</label>
                        <input type="text" name="cvv" id="cvv" class="form-control req">
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
                    <label class="check-in" for="terceiro">Pagar com Pix
                        <input class="form-check-input" value="pix" name="metodo" id="terceiro" type="radio">
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
                @if ($transporte)
                    <div class="row">
                        <div class="col-6 my-2 mb-3">
                            <div class="spans text-center"><div class="nome"><span>Valor de Entrega</span></div></div>
                            <div class="spans text-center"><div class="email"><span>R$ {{number_format($transporte->valor_frete, 2, ',', '.')}}</span></div></div>
                        </div>
                        <div class="col-6 my-2 mb-3">
                            <div class="spans text-center"><div class="nome"><span>Tempo de Entrega</span></div></div>
                            <div class="spans text-center"><div class="email"><span>{{$transporte->tempo_entrega}} Minutos</span></div></div>
                        </div>
                    </div>
                    <div class="mt-3" id="linha-horizontal"></div>
                @endif
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
