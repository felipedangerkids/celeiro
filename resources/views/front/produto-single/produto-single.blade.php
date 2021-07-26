@extends('layouts.main')
@section('content')
    <form action="{{ route('cart.add') }}" method="post">
        @csrf
        <div class="container">
            <div class="logo-right mt-5 ">
                <div class="seta-right">
                    <a href="{{ url('/') }}"><img src="{{ url('assets/img/Group 8.png') }}" alt=""></a>
                </div>
                <div class="logo-left">
                    <img src="{{ url('assets/img/Camada x0020 3.png') }}" alt="">
                </div>
            </div>

            <div class="single mt-5">
                <div class="text-center">
                    <div class="row">
                        <div class="descriptions col-5">
                            <div class="lupulo">
                                <img src="{{ url('assets/img/hop 1.png') }}" alt="">
                                <div class="cap">
                                    <span class="amargor">ibu <br> (amargor)</span>
                                    <span>{{ $produto->bitterness }}</span>
                                </div>
                            </div>
                            <div class="lupulo">
                                <img src="{{ url('assets/img/hop 1.png') }}" alt="">
                                <div class="cap">
                                    <span class="amargor">ABV <br> (TEOR ALCOÓLICO)</span>
                                    <span>{{ $produto->ibv }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="product col-5 ">
                            <button>
                                <img style="object-fit: cover;" src="{{ url('storage/produtos/' . $produto->image) }}"
                                    alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <h1>{{ $produto->name }} <br> {{ $produto->resume }}</h1>
            </div>
            <div class="text-center mt-3">
                <button class="btn btn-american-ipa">{{ $produto->type }}</button>
            </div>
            <div class="desc text-center mt-5 font">
                <p>Descrição
                    {{ $produto->description }}</p>
            </div>
            <div class="preco">
                <div class="text-center mt-5">
                    <h1>R$32,00</h1>
                </div>
                <div class="text-center">
                    <button type="button" onclick="menos()" class="a">-</button><input class="text-center" min="1"
                        id="total" name="quantity" value="0" type="number"><button type="button" onclick="mais()" class="b">+</button>
                </div>
                <div class="multiplicadores mt-3 d-flex">
                    <div>
                        <button type="button" onclick="seis()" class="c">+ 06 unid</button>
                    </div>
                    <div>
                        <button type="button" onclick="doze()" class="d">+ 12 unid</button>
                    </div>
                </div>
                <div>
                    <input type="hidden" name="id" value="{{ $produto->id }}">
                    <input type="hidden" name="name" value="{{ $produto->name }}">
                    <input type="hidden" name="price" value="{{ $produto->sellprice }}">
                    <input type="hidden" name="image" value="{{ $produto->image }}">
                    <input type="hidden" name="bitterness" value="{{ $produto->bitterness }}">
                    <input type="hidden" name="ibv" value="{{ $produto->ibv }}">
                    <input type="hidden" name="type" value="{{ $produto->type }}">
                    <input type="hidden" name="resume" value="{{ $produto->resume }}">
                </div>
                <div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-adicionar">ADICIONAR</button>
                    </div>
                    <div class="text-center mt-4">
                      <a href="{{ route('pre.checkout') }}"> <button type="button" class="btn btn-adicionar">ITENS ({{ \Cart::getTotalQuantity() }}) {{  'R$ '.number_format(\Cart::getTotal(), 2, ',', '.') }}  </button></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="fundo">
    </div>
    <script>
        function mais() {
            var atual = document.getElementById("total").value;
            var novo = atual - -1; //Evitando Concatenacoes
            document.getElementById("total").value = novo;
        }

        function seis() {
            var atual = document.getElementById("total").value;
            var novo = atual - -6; //Evitando Concatenacoes
            document.getElementById("total").value = novo;
        }

        function doze() {
            var atual = document.getElementById("total").value;
            var novo = atual - -12; //Evitando Concatenacoes
            document.getElementById("total").value = novo;
        }

        function menos() {
            var atual = document.getElementById("total").value;
            if (atual > 0) {
                //evita números negativos
                var novo = atual - 1;
                document.getElementById("total").value = novo;
            }
        }
    </script>
@endsection
