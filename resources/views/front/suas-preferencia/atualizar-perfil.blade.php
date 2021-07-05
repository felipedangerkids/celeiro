@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>SUAS <br> preferências</h1>
        </div>
        <div class="mt-4" id="linha-horizontal"></div>
        <div class="profile mt-5">
            <div style="width: 100px;" class="foto-perfil mx-auto  text-center">
                <img style="width: 100%;" class="mx-auto" src="{{ url('assets/img/avatar.png') }}" alt="">
            </div>
            <div class="editar-foto text-center">
                <button class="btn btn-edit">
                    <img src="{{ url('assets/img/edit.png') }}" alt="">
                </button>
            </div>
        </div>
        <form action="{{ route('perfil.update', $user->id) }}" method="POST">
            @csrf
            <div class="formulario">
                <div class="inputs pt-3">
                    <label for="">NOME:</label>
                    <input type="text" name="name" value="{{ $user->name }}">
                </div>
                <div class="inputs pt-3">
                    <label for="">E-mail:</label>
                    <input type="email" name="email" value="{{ $user->email }}">
                </div>
                <div class="inputs pt-3">
                    <label for="">WhatsApp:</label>
                    <input type="text" name="whatsapp" id="phone" value="{{ $user->whatsapp }}">
                </div>
            </div>
            <div class="text-center pt-5">
                <button type="submit" class="btn btn-adicionar">ATUALIZAR</button>
            </div>
        </form>
    </div>
@endsection
