@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>SUAS <br> preferências</h1>
        </div>
        <div class="profile mt-3">
            <div class="d-flex">
                <div class="avatar">
                    <img src="{{ url('assets/img/avatar.png') }}" alt="">
                </div>
                <div class="identidade">
                    <div class="nome">
                        <span> {{ auth()->user()->name }}</span>
                    </div>
                    <div class="email">
                        <span> {{ auth()->user()->email }}</span>
                    </div>
                    <div class="telefone">
                        <span> {{ auth()->user()->whatsapp }}</span>
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
                    <input name="pedido" value="Pedir Agora" class="form-check-input later" id="1" type="radio">
                    <span class="check"></span>
                </label>
            </div>
            <div class="mt-3" id="linha-horizontal"></div>
        </div>
        <div class="profile mt-3">
            <div class="row">
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
                    <div class="wrapper">
                        <div class="lista-item">
                            <label class="check-in" for="6">Pedir agora
                                <input name="pedido" value="Pedir Agora" class="form-check-input now" id="6" type="radio">
                                <span class="check "></span>
                            </label>

                            <div class="times d-none">
                                <div class="horarios">
                                    <div class="mt-3 row ">
                                        <div class="col-12">
                                            <label class="check-in" for="7">
                                                <input class="form-check-input" name="horario" id="7" type="radio">
                                                7:00 - 8:00
                                                <span class="check"></span>
                                            </label>
                                        </div>
                                        <div class="col-12">
                                            <label class="check-in" for="8">
                                                <input class="form-check-input" name="horario" id="8" type="radio">
                                                7:00 - 8:00
                                                <span class="check"></span>
                                            </label>
                                        </div>
                                        <div class="col-12">
                                            <label class="check-in" for="9">
                                                <input class="form-check-input" name="horario" id="9" type="radio">
                                                7:00 - 8:00
                                                <span class="check"></span>
                                            </label>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
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
                                <img src="{{ url('assets/img/moto.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <label class="check-in" for="3">Receber em casa
                    <input name="entrega" class="form-check-input" id="3" type="radio">
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
                    <input name="entrega" class="form-check-input" id="4" type="radio">
                    <span class="check"></span>
                </label>
            </div>
            <div class="mt-3" id="linha-horizontal"></div>
        </div>
        <div class="text-center my-5">
            <button class="btn btn-adicionar">salvar e fechar</button>
        </div>
    </div>
@endsection
