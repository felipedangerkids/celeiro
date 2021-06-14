@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="logo-right mt-5 ">
            <div class="seta-right">
                <a href="/inicio"><img src="{{ url('assets/img/Group 8.png') }}" alt=""></a>
            </div>
            <div class="logo-left">
                <img src="{{ url('assets/img/Camada x0020 3.png') }}" alt="">
            </div>
        </div>

        <div class="icones-gerais mt-4">
            <div class="d-flex text-center">
                <div class="beer">
                    <a href="/cervejas">
                        <img src="{{ url('assets/img/beer 1.png') }}" alt="">
                    </a>
                </div>
                <div class="beer">
                    <a href="/kits">
                        <img src="{{ url('assets/img/beer-box 1.png') }}" alt="">
                    </a>
                </div>
                <div class="beer">
                    <a href="/embutidos">
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
                    <div class="product_ col-5">
                        <a href="/produto-single">
                            <img src="{{ url('assets/img/kit1.png') }}" alt="">
                        </a>
                        <div class="caption">
                            <span>wenski bier </span>
                        </div>
                        <div class="mt-4">
                            <h1>R$ 42,00</h1>
                        </div>
                        <div class="ver-mais">
                            <a href="#">VER MAIS</a>
                        </div>
                    </div>
                    <div class="product_ col-5  mb-5">
                        <a class="/produto-single">
                            <img src="{{ url('assets/img/kit2.png') }}" alt="">
                        </a>
                        <div class="caption">
                            <span>wenski bier</span>
                        </div>
                        <div class="mt-4">
                            <h1>R$ 42,00</h1>
                        </div>
                        <div class="ver-mais">
                            <a href="#">VER MAIS</a>
                        </div>
                    </div>
                    <div class="product_ col-5 ">
                        <a class="/produto-single">
                            <img src="{{ url('assets/img/kit1.png') }}" alt="">
                        </a>
                        <div class="caption">
                            <span>wenski bier</span>
                        </div>
                        <div class="mt-4">
                            <h1>R$ 42,00</h1>
                        </div>
                        <div class="ver-mais">
                            <a href="#">VER MAIS</a>
                        </div>
                    </div>
                    <div class="product_ col-5  mb-5">
                        <a class="/produto-single">
                            <img src="{{ url('assets/img/kit2.png') }}" alt="">
                        </a>
                        <div class="caption">
                            <span>wenski bier</span>
                        </div>
                        <div class="mt-4">
                            <h1>R$ 42,00</h1>
                        </div>
                        <div class="ver-mais">
                            <a href="#">VER MAIS</a>
                        </div>
                    </div>
                    <div class="product_ col-5  mb-5">
                        <a class="/produto-single">
                            <img src="{{ url('assets/img/kit1.png') }}" alt="">
                        </a>
                        <div class="caption">
                            <span>wenski bier</span>
                        </div>
                        <div class="mt-4">
                            <h1>R$ 42,00</h1>
                        </div>
                        <div class="ver-mais">
                            <a href="#">VER MAIS</a>
                        </div>
                    </div>
                    <div class="product_ col-5  mb-5">
                        <a class="/produto-single">
                            <img src="{{ url('assets/img/kit2.png') }}" alt="">
                        </a>
                        <div class="caption">
                            <span>wenski bier</span>
                        </div>
                        <div class="mt-4">
                            <h1>R$ 42,00</h1>
                        </div>
                        <div class="ver-mais">
                            <a href="#">VER MAIS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fundo">
        </div>
    </div>
@endsection
