@extends('layouts.main')
@section('content')
    <div class="container store">

        <div class="text-center pt-4">
            <h1>ENTRAR</h1>
        </div>
        <div class="mt-4" id="linha-horizontal"></div>
        <div class="login-store">
            <form action="{{ route('store.login.post') }}" method="POST">
                @csrf
                <div class="formulario">
                    <div class="inputs pt-3">
                        <label for="">E-MAIL:</label>
                        <input name="email" type="email" placeholder="seuemail@gmail.com">
                    </div>
                    <div class="inputs pt-3">
                        <label for="">SENHA:</label>
                        <input name="password" type="password" placeholder="*****">
                    </div>
                </div>
                <div class="text-center pt-5">
                    <button type="submit" class="btn btn-adicionar">ENTRAR</button>
                </div>
                <div class="text-center text-white mt-5">
                    <p>Não possui cadastro? <a href="{{ route('store.register') }}"> Clique Aqui </a></p>
                </div>
            </form>

        </div>

    </div>
@endsection
