@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>SUAS <br> preferências</h1>
        </div>
        <div class="mt-4" id="linha-horizontal"></div>
        <div class="profile mt-5">
            <div class="foto-perfil text-center">
                <img src="{{ url('assets/img/Group 1.png') }}" alt="">
            </div>
            <div class="editar-foto text-center">
                <button class="btn btn-edit">
                    <img src="{{ url('assets/img/edit.png') }}" alt="">
                </button>
            </div>
        </div>
        <div class="formulario">
            <div class="inputs pt-3">
                <label for="">NOME:</label>
                <input type="nome" placeholder="Vilson Paulo Beckhauser">
            </div>
            <div class="inputs pt-3">
                <label for="">E-mail:</label>
                <input type="email" placeholder="caiojrtv@gmail.com">
            </div>
            <div class="inputs pt-3">
                <label for="">WhatsApp:</label>
                <input type="number" placeholder="41 99949-8611">
            </div>
        </div>
        <div class="text-center pt-5">
            <button class="btn btn-adicionar">ATUALIZAR</button>
        </div>
    </div>
@endsection
