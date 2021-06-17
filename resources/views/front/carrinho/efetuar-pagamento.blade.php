@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>EFETUAR <br> PAGAMENTO</h1>
        </div>
        <div class="linha" id="linha-horizontal">

        </div>
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
                    <input  id="primeiro" type="checkbox">
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
                <label class="check-in" for="segundo">Pagar com dinheiro
                    <input class="form-check-input" id="segundo" type="checkbox">
                    <span class="check"></span>
                </label>
            </div>
            <div class="mt-5" id="linha-horizontal"></div>
        </div>
        <div class="profile mt-5">
            <div class="d-flex">
                <div class="col-4">
                    <div class="fundo-branco">
                        <div class="text-center">
                            <div class="lata">
                                <a href="#">
                                    <img src="{{ url('assets/img/mutum.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title col-6">
                    <div class="nome_">
                        <span>Mutum Cavalo <br> Lata 473 ml</span> <br>
                    </div>
                    <div class="unid">
                        <span>10 UNID</span> <br>
                    </div>
                    <div class="preco">
                        <h2>R$32,00</h2> <br>
                    </div>
                </div>
                <div class="d-block col-2">
                    <div class="edit">
                        <button class="btn btn-edit">
                            <img src="{{ url('assets/img/edit.png') }}" alt="">
                        </button>
                    </div>
                    <div class="edit mt-5">
                        <button class="btn btn-lixeira"> <img src="{{ url('assets/img/lixeira.png') }}" alt=""></button>
                    </div>
                </div>
            </div>
            <div class="mt-5" id="linha-horizontal"></div>
        </div>
        <div class="text-center mt-5">
            <button class="btn btn-adicionar">PAGAR E FINALIZAR</button>
        </div>
    </div>
@endsection
