@extends('layouts.main')
@section('content')
    <input type="hidden" value="{{$ship}}" id="shipjson">

    <div class="container">
        <div class="text-center mt-5">
            <a href="{{url()->previous()}}"><img src="{{asset('assets/img/arrow-left.png')}}" alt=""></a>
            <h2 class="ms-2 inline-block text-white">ALTERAR ENDEREÇO</h2>
        </div>

        <div class="my-5 d-flex justify-content-center">
            <form  action="{{ route('address.update') }}" method="POST">
                @csrf
                <input type="hidden" name="url_previous" value="{{url()->previous()}}">
                <input type="hidden" name="address_id" value="{{ $address->id ?? '' }}">
                <div class="row formulario">
                    <div class="col-8 inputs mt-3">
                        <input type="text" name="cep" id="cep" placeholder="CEP" value="{{$address->cep ?? ''}}">
                        @error('cep')
                            <span class="invalid-feedbeck">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-4 mt-3 d-flex align-items-center">
                        <button type="button" id="buscar" class="btn px-3 py-3 btn-light">Buscar</button>
                    </div>

                    <div class="col-9 inputs mt-3">
                        <input id="endereco" name="endereco" type="text" placeholder="Endereço/Rua" value="{{$address->endereco ?? ''}}">
                        @error('endereco')
                            <span class="invalid-feedbeck">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-3 inputs mt-3">
                        <input id="numero" name="numero" type="number" placeholder="Nº" value="{{$address->numero ?? ''}}">
                        @error('numero')
                            <span class="invalid-feedbeck">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-12 inputs mt-3">
                        <input id="complemento" name="complemento" type="text" placeholder="Complemento" value="{{$address->complemento ?? ''}}">
                    </div>
                    <div class="col-12 inputs mt-3">
                        <input id="ref" name="ref" type="text" value="{{$address->ref ?? ''}}" placeholder="Ponto de Referencia">
                    </div>
                    <div class="col-12 inputs mt-3">
                        <input id="bairro" name="bairro" type="text" value="{{$address->bairro ?? ''}}" placeholder="Bairro">
                        @error('bairro')
                            <span class="invalid-feedbeck">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-6 inputs mt-3">
                        <input id="cidade" name="cidade" type="text" value="{{$address->cidade ?? ''}}" placeholder="Cidade">
                        @error('cidade')
                            <span class="invalid-feedbeck">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-6 inputs mt-3">
                        <input id="estado" name="estado" type="text" value="{{$address->estado ?? ''}}" placeholder="Estado">
                        @error('estado')
                            <span class="invalid-feedbeck">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="my-3 linha-horizontal"></div>

                    <div class="col-12">
                        <input type="hidden" name="ship_id" value="{{ $ship->id ?? '' }}">
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
                                    <input name="data" value="Pedir Agora" class="form-check-input later" id="1" type="radio">
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
                                            <label class="check-in" for="6">Agendar Pedido
                                                <input name="data" value="Agendar Pedido" class="form-check-input now" id="6"
                                                    type="radio">
                                                <span class="check "></span>
                                            </label>

                                            <div class="times d-none">
                                                <div class="horarios">
                                                    <div class="mt-3 row ">
                                                        <div class="col-12">
                                                            <label class="check-in" for="7">
                                                                <input class="form-check-input" name="horario" value="07:00-08:00" id="7" type="radio">
                                                                07:00 - 08:00
                                                                <span class="check"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="check-in" for="8">
                                                                <input class="form-check-input" name="horario" value="08:00-09:00" id="8" type="radio">
                                                                08:00 - 09:00
                                                                <span class="check"></span>
                                                            </label>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="check-in" for="9">
                                                                <input class="form-check-input" value="09:00-10:00" name="horario" id="9" type="radio">
                                                                09:00 - 10:00
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
                                    <input name="tipo" class="form-check-input" value="Receber em Casa" id="3" type="radio">
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
                                <label class="check-in" for="4">Retirar pedido
                                    <input name="tipo" value="Retirar Pedido" class="form-check-input" id="4" type="radio">
                                    <span class="check"></span>
                                </label>
                            </div>
                            <div class="mt-3" id="linha-horizontal"></div>
                        </div>
                    </div>

                    <div class="d-flex mt-3">
                        <button type="submit" class="btn btn-block btn-c-orange">ATUALIZAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- <div class="container">
        <div class="text-center pt-4">
            <h1>SUAS <br> preferências</h1>
        </div>

        <div class="mt-4" id="linha-horizontal"></div>
        <form action="{{ route('user.adress.post') }}" method="POST">
            @csrf
            <div class="formulario">
                <div class="container">
                    <div class="row">
                        
                        <div class="inputs_ pt-3 col-6">
                            <label for="">Ponto de Ref:</label>
                            
                        </div>
                        <div class="inputs_ pt-3 col-8">
                            <label for="">Bairro</label>
                            
                        </div>
                        <div class="inputs_ pt-3 col-6">
                            <label for="">Cidade</label>
                            
                        </div>
                        <div class="inputs_ pt-3 col-6">
                            <label for="">Estado</label>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center pt-5">
                <button type="submit" class="btn btn-adicionar">SALVAR</button>
            </div>
        </form>
    </div> --}}
@endsection
