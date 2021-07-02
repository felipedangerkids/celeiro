@extends('layouts.main')
@section('content')
    <div class="container store">

        <div class="text-center pt-4">
            <h1>CADASTRAR</h1>
        </div>
        <div class="mt-4" id="linha-horizontal"></div>
        <div class="login-store">
            <form action="{{ route('store.register.post') }}" method="POST">
                @csrf
                <div class="formulario">
                    <div class="inputs pt-3">
                        <label for="">NOME:</label>
                        <input type="text" name="name" placeholder="Seu Nome Completo">
                    </div>
                    <div class="inputs pt-3">
                        <label for="">E-MAIL:</label>
                        <input type="email" name="email" placeholder="seuemail@gmail.com">
                    </div>
                    <div class="inputs pt-3">
                        <label for="">SENHA:</label>
                        <input type="password" name="password" placeholder="*****">
                    </div>
                    <div class="inputs pt-3">
                        <label for="">WHATSAPP:</label>
                        <input type="text" name="whatsapp" placeholder="(00) 99999-9999">
                    </div>
                </div>
                <div class="text-center pt-5">
                    <button type="submit" class="btn btn-adicionar">CADASTRAR</button>
                </div>
                <div class="text-center text-white mt-5">
                    <p>Já possui cadastro? <a href="{{ route('store.login') }}"> Clique Aqui </a></p>
                </div>
            </form>
        </div>

    </div>
@endsection
