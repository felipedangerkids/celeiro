@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="logo-right mt-5 ">
            <div class="seta-right">
                <a href="{{ url('/') }}"><img src="{{ url('assets/img/Group 8.png') }}" alt=""></a>
            </div>
            <div class="logo-left">
                <img src="{{ url('assets/img/Camada x0020 3.png') }}" alt="">
            </div>
        </div>

        <div class="icones-gerais mt-4">
                 <div class="d-flex text-center">
                <div class="beer">
                    <a href="{{ route('shop.cervejas') }}">
                        <img src="{{ url('assets/img/beer 1.png') }}" alt="">
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
        <div class="text-center mt-4">
            <button class="btn btn-american-ipa_">American IPA</button>
            <button class="btn btn-american-ibv">IBV 7% </button>
        </div>

        <div class="destaque-produtos">
            <div class="text-center">
                <div class="row">
                    @foreach ($produtos as $produto)
                    <div class="product col-5 mt-3 mb-5">
                        <a href="{{ route('shop.single', $produto->id) }}">
                            <img style="object-fit: cover;" src="{{ url('storage/produtos/'.$produto->image) }}" alt="">
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
