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

        <div class="single mt-5">
            <div class="text-center">
                <div class="row">
                    <div class="descriptions col-5">
                        <div class="lupulo">
                            <img src="{{ url('assets/img/hop 1.png') }}" alt="">
                            <div class="cap">
                                <span class="amargor">ibu <br> (amargor)</span>
                                <span>70 (ALTO)</span>
                            </div>
                        </div>
                        <div class="lupulo">
                            <img src="{{ url('assets/img/hop 1.png') }}" alt="">
                            <div class="cap">
                                <span class="amargor">ABV <br> (TEOR ALCOÓLICO)</span>
                                <span>7% (ALTO)</span>
                            </div>
                        </div>
                    </div>

                    <div class="product col-5 ">
                        <button>
                            <img src="{{ url('assets/img/Group 25.png') }}" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <h1>Mutum Cavalo <br> Lata 473 ml</h1>
        </div>
        <div class="text-center mt-3">
            <button class="btn btn-american-ipa">American IPA</button>
        </div>
        <div class="desc text-center mt-5">
            <p>Descrição
                Com uma base de maltes consistente e uma enorme carga de lúpulos norteamericanos, é a cerveja ideal para
                lupulomaníacos.</p>

            <p> Possui aromas intensos remetendo a frutas cítricas como abacaxi, limão e maracujá, tem final amargo,
                potente, longo e seco, como uma IPA de respeito deve ter.</p>
        </div>





        <div class="preco">
            <div class="text-center mt-5">
                <h1>R$32,00</h1>
            </div>
            <div class="text-center">
                <button onclick="menos()" class="a">-</button><input class="text-center" min="0" id="total"
                    type="number"><button onclick="mais()" class="b">+</button>
            </div>
            <div class="multiplicadores mt-3 d-flex">
                <div>
                    <button onclick="mais()" class="c">+ 06 unid</button>
                </div>
                <div>
                    <button onclick="mais()" class="d">+ 12 unid</button>
                </div>
            </div>
            <div>
                <div class="text-center mt-4">
                    <a href="/adc-carrinho" class="btn btn-adicionar">ADICIONAR</a>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-adicionar">ITENS (1) R$ 42,00</button>
                </div>
            </div>
        </div>
    </div>
    <div class="fundo">
    </div>
    <script>
        function mais() {
            var atual = document.getElementById("total").value;
            var novo = atual - -1; //Evitando Concatenacoes
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
