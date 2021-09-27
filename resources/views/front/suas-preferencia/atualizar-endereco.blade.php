@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>SUAS <br> preferências</h1>
        </div>

        <div class="mt-4" id="linha-horizontal"></div>
        <form action="{{ route('user.adress.post') }}" method="POST">
            @csrf
            <div class="formulario">
                <div class="container">
                    <div class="row">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="inputs_ pt-3 col-4">
                            <label for="">CEP:</label>
                            <input type="number" name="cep" id="cep" value="{{$address->cep ?? ''}}">
                        </div>
                        <div style="margin-top: 36px;" class="pt-3 col-4">
                            <button type="button" id="buscar" class="btn btn-light">Buscar</button>
                        </div>
                        <div class="inputs_ pt-3 col-12">
                            <label for="">Endereço:</label>
                            <input id="endereco" name="endereco" type="text" value="{{$address->endereco ?? ''}}">
                        </div>
                        <div class="inputs_ pt-3 col-6">
                            <label for="">Complemento:</label>
                            <input id="complemento" name="complemento" type="text" value="{{$address->complemento ?? ''}}">
                        </div>
                        <div class="inputs_ pt-3 col-6">
                            <label for="">Ponto de Ref:</label>
                            <input id="ref" name="ref" type="text" value="{{$address->ref ?? ''}}">
                        </div>
                        <div class="inputs_ pt-3 col-4">
                            <label for="">Número</label>
                            <input id="numero" name="numero" type="number" value="{{$address->numero ?? ''}}">
                        </div>
                        <div class="inputs_ pt-3 col-8">
                            <label for="">Bairro</label>
                            <input id="bairro" name="bairro" type="text" value="{{$address->bairro ?? ''}}">
                        </div>
                        <div class="inputs_ pt-3 col-6">
                            <label for="">Cidade</label>
                            <input id="cidade" name="cidade" type="text" value="{{$address->cidade ?? ''}}">
                        </div>
                        <div class="inputs_ pt-3 col-6">
                            <label for="">Estado</label>
                            <input id="estado" name="estado" type="text" value="{{$address->estado ?? ''}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center pt-5">
                <button type="submit" class="btn btn-adicionar">SALVAR</button>
            </div>
        </form>
    </div>
@endsection
