@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>SUAS <br> preferências</h1>
        </div>

        <div class="mt-4" id="linha-horizontal"></div>

        <div class="formulario">
            <div class="container">
                <div class="row">
                    <div class="inputs_ pt-3 col-4">
                        <label for="">CEP:</label>
                        <input type="number" placeholder="83510-070">
                    </div>
                    <div class="inputs_ pt-3 col-12">
                        <label for="">Endereço:</label>
                        <input type="text" placeholder="Rua Valparaizo">
                    </div>
                    <div class="inputs_ pt-3 col-6">
                        <label for="">Complemento:</label>
                        <input type="text" placeholder="Bloco 15 apto 101">
                    </div>
                    <div class="inputs_ pt-3 col-6">
                        <label for="">Ponto de Ref:</label>
                        <input type="text" placeholder="Celeiro do Malte">
                    </div>
                    <div class="inputs_ pt-3 col-4">
                        <label for="">Número</label>
                        <input type="number" placeholder="391">
                    </div>
                    <div class="inputs_ pt-3 col-8">
                        <label for="">Bairro</label>
                        <input type="text" placeholder="Bacacheri">
                    </div>
                    <div class="inputs_ pt-3 col-6">
                        <label for="">Cidade</label>
                        <input type="text" placeholder="Curitiba">
                    </div>
                    <div class="inputs_ pt-3 col-6">
                        <label for="">Estado</label>
                        <input type="text" placeholder="Paraná">
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center pt-5">
            <button class="btn btn-adicionar">ATUALIZAR</button>
        </div>
    </div>
@endsection
