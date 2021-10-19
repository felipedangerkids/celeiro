@extends('layouts.main')
@section('content')
<div class="container">
    <div class="text-center mt-5">
        <a href="{{route('home')}}"><img src="{{asset('assets/img/arrow-left.png')}}" alt=""></a>
        <h2 class="ms-2 inline-block text-white">VOLTAR</h2>
    </div>

    <div class="text-center mt-3">
        <img class="img-fluid" src="{{ asset('assets/img/logo-simples.png')}}" alt="">
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

    <div class="mt-5">
        <div class="row catalogo-location justify-content-center">
            <div class="col-3 d-flex flex-column align-items-center">
                <div class="beer">
                    <a href="{{ route('shop.cervejas') }}">
                        <img src="{{ asset('assets/img/beer 1.png') }}" alt="merg">
                    </a>
                </div>
                <p class="pt-2 text-orange">Cervejas</p>
            </div>
            <div class="col-3 d-flex flex-column align-items-center">
                <div class="beer">
                    <a href="{{ route('shop.kits') }}">
                        <img src="{{ asset('assets/img/beer-box 1.png') }}" alt="">
                    </a>
                </div>
                <p class="pt-2 text-orange">Kits</p>
            </div>
            <div class="col-3 d-flex flex-column align-items-center">
                <div class="beer">
                    <a href="{{ route('shop.embutidos') }}">
                        <img src="{{ asset('assets/img/sausage 1.png') }}" alt="">
                    </a>
                </div>
                <p class="pt-2 text-orange">embutidos</p>
            </div>
        </div>
    </div>

    <div class="my-3">
        <div class="row justify-content-center product-showcase">
            @foreach ($produtos as $product)
                @if ($product->spotlight == 1)
                    <div class="col-5 col-md-4 my-3 product d-flex flex-column align-items-center">
                        <div class=" mb-3 product-image">
                            <a href="{{ route('shop.single', $product->slug) }}">
                                <img src="{{ asset('storage/produtos/'.$product->image) }}" alt="">
                            </a>
                        </div>
                        <div class="caption text-center">
                            <span>{{ $product->name }}</span>
                        </div>
                        <div class="caption price mt-auto text-center text-orange">
                            <span>{{  'R$ '.number_format($product->sellprice, 2, ',', '.') }}  </span>
                        </div>
                        <div class="caption mt-auto">
                            <a href="{{ route('shop.single', $product->slug) }}">  <button class="btn btn-adicionar">Ver Mais</button></a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="fundo">
    </div>
    </div>
@endsection
