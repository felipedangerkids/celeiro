@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center mt-5 mb-4">
            <img class="img-fluid" src="{{ asset('assets/img/logo-simples.png')}}" alt="">
        </div>

        <div class="mt-3">
            <div class="row justify-content-center">
                <div class="col-10 text-center">
                    @php
                        $cpf = auth()->guard('cliente')->user()->cpf;
                    @endphp
                    <h3>CPF: <span class="text-orange">{{substr($cpf, 0, 3)}}.{{substr($cpf, 3, 3)}}.{{substr($cpf, 6, 3)}}-{{substr($cpf, 9, 2)}}</span></h3>
                </div>
                <div class="col-10 text-center">
                    <h3>MESA: <span class="text-orange">{{$table->name}}</span></h3>
                </div>

                <div class="col-8 text-center mt-5">
                    <h2 class="text-size-2">FAÇA SEU PEDIDO</h2>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <div class="row catalogo-location justify-content-center">
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="beer">
                        <a href="{{ route('mesa.catalogo', 'cervejas') }}">
                            <img src="{{ asset('assets/img/beer 1.png') }}" alt="merg">
                        </a>
                    </div>
                    <p class="pt-2 text-orange">Cervejas</p>
                </div>
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="beer">
                        <a href="{{ route('mesa.catalogo', 'kits') }}">
                            <img src="{{ asset('assets/img/beer-box 1.png') }}" alt="">
                        </a>
                    </div>
                    <p class="pt-2 text-orange">Kits</p>
                </div>
                <div class="col-3 d-flex flex-column align-items-center">
                    <div class="beer">
                        <a href="{{ route('mesa.catalogo', 'embutidos') }}">
                            <img src="{{ asset('assets/img/sausage 1.png') }}" alt="">
                        </a>
                    </div>
                    <p class="pt-2 text-orange">embutidos</p>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <div class="row justify-content-center">
                <div class="col-10 d-flex p-0">
                    <a href="{{route('comanda')}}" class="btn btn-block btn-c-location-c btn-c-orange">COMANDA</a>
                </div>
            </div>
        </div>
    </div>
@endsection
