@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>ENTRAR</h1>
        </div>
        <div class="mt-4" id="linha-horizontal"></div>
        <div class="formulario">
            <div class="inputs pt-3">
                <label for="">E-MAIL:</label>
                <input type="email" placeholder="seuemail@gmail.com">
            </div>
            <div class="inputs pt-3">
                <label for="">SENHA:</label>
                <input type="password" placeholder="*****">
            </div>
        </div>
        <div class="text-center pt-5">
            <button class="btn btn-adicionar">ATUALIZAR</button>
        </div>
    </div>
@endsection
