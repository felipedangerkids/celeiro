@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>FINALIZAR <br> COMPRA</h1>
        </div>
        <div class="profile mt-3">
            <div class="d-flex">
                <div>
                    <img src="{{ url('assets/img/Group 1.png') }}" alt="">
                </div>
                <div class="identidade">
                    <div class="nome">
                        <span> Vilson Paulo Beckhauser</span>
                    </div>
                    <div class="email">
                        <span> caiojrtv@gmail.com</span>
                    </div>
                    <div class="telefone">
                        <span> 41 99949-8611</span>
                    </div>
                </div>
                <div class="edit">
                    <button class="btn btn-edit"><img src="{{ url('assets/img/edit.png') }}" alt=""></button>
                </div>
            </div>
            <div id="linha-horizontal"></div>
        </div>
        <div class="profile mt-3">
            <div class="d-flex">
                <div>
                    <div class="icones-back">
                        <div class="text-center">
                            <div class="icon-img">
                                <img src="{{ url('assets/img/gps.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="spans">
                    <div class="nome">
                        <span>Rua Valparaizo, 391 - Bacacheri - Curitiba</span> <br>
                    </div>
                </div>
                <div class="edit">
                    <div>
                        <button class="btn btn-edit">
                            <img src="{{ url('assets/img/edit.png') }}" alt="">
                        </button>
                    </div>
                </div>
            </div>
            <div class="mt-3" id="linha-horizontal"></div>
        </div>
        <div class="profile mt-3">
            <div class="d-flex">
                <div>
                    <div class="icones-back">
                        <div class="text-center">
                            <div class="icon-img">
                                <img src="{{ url('assets/img/relogio.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="spans">
                    <div class="email">
                        <span>Pedir agora</span> <br>
                    </div>
                </div>
                <div class="edit">
                    <button class="btn btn-edit">
                        <img src="{{ url('assets/img/edit.png') }}" alt="">
                    </button>
                </div>
            </div>
            <div class="mt-3" id="linha-horizontal"></div>
        </div>
        <div class="profile mt-3">
            <div class="d-flex">
                <div>
                    <div class="icones-back">
                        <div class="text-center">
                            <div class="icon-img">
                                <img src="{{ url('assets/img/moto.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="spans">
                    <div class="email">
                        <span>Receber em casa</span> <br>
                    </div>
                </div>
                <div class="edit">
                    <button class="btn btn-edit">
                        <img src="{{ url('assets/img/edit.png') }}" alt="">
                    </button>
                </div>
            </div>
            <div class="mt-3" id="linha-horizontal"></div>
        </div>
        <div class="profile mt-3">
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
            <div class="mt-3" id="linha-horizontal"></div>
        </div>
        <div class="text-center mt-5">
            <button class="btn btn-adicionar">FECHAR PEDIDO</button>
        </div>
    </div>
@endsection