@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>SUAS <br> preferências</h1>
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
            <div class="mt-3 text-center">
                <button class="btn btn-adicionar">MEUS PEDIDOS</button>
            </div>
            <div class="mt-4" id="linha-horizontal"></div>
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
                <label class="check-in" for="1">Pedir agora
                    <input class="form-check-input" id="1" type="checkbox">
                    <span class="check"></span>
                </label>
            </div>
            <div class="mt-3" id="linha-horizontal"></div>
        </div>
        <div class="profile mt-3">
            <div class="d-flex">
                <div>
                    <div class="icones-back">
                        <div class="text-center">
                            <div class="icon-img">
                                <img src="{{ url('assets/img/calendario.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <label class="check-in" for="2">Agendar pedido
                    <input class="form-check-input" id="2" type="checkbox">
                    <span class="check"></span>
                </label>
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
                <label class="check-in" for="3">Receber em casa
                    <input class="form-check-input" id="3" type="checkbox">
                    <span class="check"></span>
                </label>
            </div>
            <div class="mt-3" id="linha-horizontal"></div>
        </div>
        <div class="profile mt-3">
            <div class="d-flex">
                <div>
                    <div class="icones-back">
                        <div class="text-center">
                            <div class="icon-img">
                                <img src="{{ url('assets/img/carro.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <label class="check-in" for="4">retirar pedido
                    <input class="form-check-input" id="4" type="checkbox">
                    <span class="check"></span>
                </label>
            </div>
            <div class="mt-3" id="linha-horizontal"></div>
        </div>
        <div class="text-center mt-5">
            <button class="btn btn-adicionar">salvar e fechar</button>
        </div>
    </div>
@endsection
