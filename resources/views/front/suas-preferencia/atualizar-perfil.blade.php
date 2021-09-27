@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>SUAS <br> preferências</h1>
        </div>
        <div class="mt-4" id="linha-horizontal"></div>
        <div class="profile mt-5">
            <div style="width: 100px;" class="foto-perfil mx-auto  text-center">
                <div class="profile-photo-edit" @if (auth()->user()->profile_photo_path) style="background-image: url('{{asset('storage/profile_path/'.auth()->user()->profile_photo_path)}}');" @endif></div>
                {{-- @if (auth()->user()->profile_photo_path)
                    <img style="width: 100%;" class="mx-auto" src="{{ asset('storage/profile_path/'.auth()->user()->profile_photo_path) }}" alt="">
                @else
                    <img style="width: 100%;" class="mx-auto" src="{{ url('assets/img/avatar.png') }}" alt="">
                @endif --}}
            </div>
            <div class="editar-foto text-center">
                <button class="btn btn-edit btn-edit-img">
                    <img src="{{ url('assets/img/edit.png') }}" alt="">
                </button>
            </div>
        </div>
        <form action="{{ route('perfil.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="img_profile" id="file-custom">
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
                <div class="inputs pt-3">
                    <label for="">SENHA:</label>
                    <input type="password" name="password" id="password" placeholder="************">
                </div>
            </div>
            <div class="text-center pt-5">
                <button type="submit" class="btn btn-adicionar">ATUALIZAR</button>
            </div>
        </form>
    </div>
@endsection
