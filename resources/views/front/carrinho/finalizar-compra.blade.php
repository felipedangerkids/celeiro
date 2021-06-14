@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>FINALIZAR <br> COMPRA</h1>
        </div>
        <div class="profile mt-3">
            <div class="d-flex">
                <div>
                    <img src="{{ url('assets/img/Group 1.png') }}" alt="">
                </div>
                <div class="spans">
                    <div class="nome">
                        <span>Vilson Paulo Beckhauser</span> <br>
                    </div>
                    <div class="email">
                        <span>caiojrtv@gmail.com</span>
                    </div>
                    <div class="telefone">
                        <span>41 99949-8611</span>
                    </div>
                </div>
                <div class="edit">
                    <img src="{{ url('assets/img/edit.png') }}" alt="">
                </div>
            </div>
            <div id="linha-horizontal"></div>
        </div>
    </div>
@endsection
