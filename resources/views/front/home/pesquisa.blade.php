@extends('layouts.main')
@section('content')
    <div class="container">
        {{-- @if (auth()->check())
        <div class="profile mt-5">
            <div class="d-flex">
                <div>
                    <a href="">
                        <img src="{{ url('assets/img/Group 1.png') }}" alt="">
                    </a>
                </div>
                <div class="spans">
                    <div class="receber">
                        <span>Receber agora em:</span> <br>
                    </div>
                    <div class="endereco">
                        <a href="/perfil">
                            <span>Avenida do Batel, 600-Batel, Curitiba-PR</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif --}}
        <div class="sub-logo mt-4">
            <img src="{{ url('assets/img/Camada x0020 3.png') }}" alt="">
        </div>

        <div class="submit-line mt-3 text-center">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <input type="texte" name="search" placeholder="  Busque o que você ama..." />
                <button class="submit-lente" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="icones-gerais mt-4">
            <div class="d-flex text-center">
                <div class="beer">
                    <a href="{{ route('shop.cervejas') }}">
                        <img src="{{ url('assets/img/beer 1.png') }}" alt="merg">
                    </a>
                </div>
                <div class="beer">
                    <a href="{{ route('shop.kits') }}">
                        <img src="{{ url('assets/img/beer-box 1.png') }}" alt="">
                    </a>
                </div>
                <div class="beer">
                    <a href="{{ route('shop.embutidos') }}">
                        <img src="{{ url('assets/img/sausage 1.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <h1>o que você <br> quer beber <br> hoje?</h1>
            <img src="{{ url('assets/img/arrow-left 1.png') }}" alt="">
        </div>

        <div class="destaque-produtos mt-5">
            <div class="text-center">
                <div class="row">
                    @foreach ($produtos as $produto)
                            <div class="product col-5 mt-3 mb-5">
                                <a href="{{ route('shop.single', $produto->id) }}">
                                    <img style="object-fit: cover;" src="{{ url('storage/produtos/' . $produto->image) }}"
                                        alt="">
                                </a>
                                <div class="caption">
                                    <span>{{ $produto->name }}</span>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="fundo">
        </div>
    </div>
@endsection
