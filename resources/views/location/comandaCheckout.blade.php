@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="mt-5">
            <div class="row justify-content-center">
                <div class="col-10 text-center">
                    <h3 class="text-orange">EFETUAR PAGAMENTO</h3>
                </div>
            </div>
        </div>

        <form class="mt-5" id="form-checkout">
            <div class="my-3 linha-horizontal"></div>
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

            <div class="my-3 linha-horizontal"></div>
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
            </div>
            <div id="money" class="container d-none">
                <div class="row justify-content-between my-4 mx-3">
                    <div class="form-group col-12 my-2">
                        <label class="text-white" for="">Troco Para:</label>
                        <input type="text" name="troco" id="dinheiro" class="form-control">
                    </div>
                </div>
            </div>

            <div class="my-3 linha-horizontal"></div>
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
            </div>

            <div class="my-3 linha-horizontal"></div>
        <form>

        <div class="mt-5">
            <div class="row justify-content-center">
                <div class="col-10 d-flex mt-4 p-0">
                    <a href="{{route('comanda.checkout')}}" class="btn btn-block btn-c-location-c btn-c-orange">PAGAR SUA COMANDA</a>
                </div>
                <div class="col-10 d-flex mt-4 p-0">
                    <a href="{{route('mesa.home')}}" class="btn btn-block btn-c-location-c btn-c-white">VOLTAR</a>
                </div>
            </div>
        </div>
    </div>
@endsection
