@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>FINALIZAR <br> COMPRA</h1>
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
                    <a href="{{ route('perfil.edit', auth()->user()->id) }}"><button class="btn btn-edit"><img
                                src="{{ url('assets/img/edit.png') }}" alt=""></button></a>
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
                @if ($adress->count() >= 1)
                        <div class="spans">
                            <div class="nome">
                                <span>{{ $adress->endereco }}, {{ $adress->numero }} - {{ $adress->bairro }} - {{ $adress->cidade }}</span> <br>
                            </div>
                        </div>
                    <div class="edit">
                        <div>
                            <a href="{{ route('user.adress') }}">  <button class="btn btn-edit">
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
                                    class="btn btn-lixeira"> <img src="{{ url('assets/img/lixeira.png') }}"
                                        alt=""></button></a>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="mt-3" id="linha-horizontal"></div>
        </div>
        <div class="text-center my-5">
            <button class="btn btn-adicionar">FECHAR PEDIDO</button>
        </div>
    </div>
@endsection
