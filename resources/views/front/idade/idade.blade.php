@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="logo-img mt-5">
            <img  src="{{ url('assets/img/Camada x0020 2.png') }}" alt="">
        </div>
        <div class="sub-logo mt-4">
            <img src="{{ url('assets/img/Camada x0020 3.png') }}" alt="">
        </div>
        <div class="idade pt-5">
            <h1>VOCÊ É MAIOR DE 18 ANOS?</h1>
        </div>
        <div class="d-flex m-5 idade-res">
            <div class="">
                <button class="btn btn-sim">SIM</button>
            </div>
            <div>
                <button class="btn btn-nao">NÃO</button>
            </div>
        </div>
    </div>
@endsection
