@extends('layouts.main')
@section('content')
    <input type="hidden" value="{{$ship}}" id="shipjson">

    <div class="container perfil">
        <div class="text-center mt-5">
            <a href="{{route('home')}}"><img src="{{asset('assets/img/arrow-left.png')}}" alt=""></a>
            <h2 class="ms-2 inline-block text-white">SEUS DADOS</h2>
        </div>

        <div class="mt-3">
            <div class="row">
                <div class="col-12 avatar d-flex justify-content-center">
                    <div class="profile-photo btn-edit-img" @if (auth()->user()->profile_photo_path) style="background-image: url('{{asset('storage/profile_path/'.auth()->user()->profile_photo_path)}}');" @endif></div>
                </div>

                <div class="col-12 d-flex justify-content-center">
                    <div class="editar-foto">
                        <button class="btn btn-edit btn-edit-img">
                            <img src="{{ url('assets/img/edit.png') }}" alt="">
                        </button>
                    </div>
                    <input type="file" id="file-custom" data-route="{{route('perfil.photo.update')}}">
                </div>

                <div class="my-3 linha-horizontal"></div>

                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-10">{{auth()->guard('cliente')->user()->name}}</div>
                        <div class="col-10">Email: {{auth()->guard('cliente')->user()->email}}</div>
                        <div class="col-10">CPF: {{auth()->guard('cliente')->user()->cpf}}</div>
                        <div class="col-10">WhatsApp: {{auth()->guard('cliente')->user()->whatsapp}}</div>
                        <div class="col-10 mt-3">
                            <a href="{{route('perfil.edit')}}" class="btn btn-edit d-flex justify-content-center">EDITAR <img src="{{ url('assets/img/edit.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>

                <div class="my-3 linha-horizontal"></div>

                <div class="col-12">
                    @if ($address)
                        <div class="row justify-content-center">
                            <div class="col-10">{{$adress->endereco}}, {{$adress->numero}} - {{$adress->bairro}}</div>
                            <div class="col-10">{{$adress->complemento}}, {{$adress->ref}}</div>
                            <div class="col-10">{{$adress->cidade}}/{{$address->estado}}</div>
                            <div class="col-10 mt-3">
                                <a href="{{route('user.address')}}" class="btn btn-edit d-flex justify-content-center">EDITAR <img src="{{ url('assets/img/edit.png') }}" alt=""></a>
                            </div>
                        </div>
                    @else
                        <div class="row justify-content-center">
                            <div class="col-10 text-center"><h5>Você ainda não cadastrou um endereço</h5></div>
                            <div class="col-10 mt-3">
                                <a href="{{route('user.address')}}" class="btn btn-edit d-flex justify-content-center">EDITAR <img src="{{ url('assets/img/edit.png') }}" alt=""></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- 
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
                @if ($adress)
                <div class="spans">
                    <div class="nome">
                        <span>{{ $adress->endereco }}, {{ $adress->numero }} - {{ $adress->bairro }} -
                            {{ $adress->cidade }}</span> <br>
                    </div>
                </div>
                <div class="edit">
                    <div>
                        <a href="{{ route('user.adress') }}"> <button class="btn btn-edit">
                                <img src="{{ url('assets/img/edit.png') }}" alt="">
                            </button></a>
                    </div>
                </div>
            @else
                <div class="spans">
                    <div class="nome">
                        <span>Você não possui endereço cadastrado<br></span> <br>
                    </div>
                </div>
                <div class="edit">
                    <div>
                        <a href="{{ route('user.adress') }}"><button class="btn btn-edit">
                                <img src="{{ url('assets/img/edit.png') }}" alt="">
                            </button></a>
                    </div>
                </div>
            @endif
            </div>
            <div class="mt-3" id="linha-horizontal"></div>
        </div>
        <form action="{{ route('user.ship.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
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
            <div class="text-center my-5">
                <button type="submit" class="btn btn-adicionar">salvar e fechar</button>
            </div>
        </form> --}}
    </div>
@endsection
