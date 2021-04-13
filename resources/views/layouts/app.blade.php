<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Celeiro do Malte</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">   
     {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ url('assets/css/painel.min.css') }}">
        

   

    <!-- Scripts -->

 
   <script src="https://kit.fontawesome.com/0ab2bcde1c.js" crossorigin="anonymous"></script>
</head>

<body class="antialiased">
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div class="logo container">
                    <img src="{{ url('assets/img/logo.svg') }}" alt="">
                </div>
            </div>

            <ul class="list-unstyled components">

                <li>
                    <a href="{{ url('dashboard') }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ url('clientes') }}">Clientes</a>
                </li>
                <li>
                    <a href="{{ url('produtos') }}">Produtos</a>
                </li>
                <li>
                    <a href="#">Vendas</a>
                </li>
                <li>
                    <a href="#">Configurações</a>
                </li>
            </ul>


        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <a href="{{ route('logout') }}" class="logout"
                        onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </div>
            </nav>
            <main class="container my-5">
                @yield('content')
            </main>

        </div>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<script src="{{ url('assets/js/painel.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                        $('#sidebarCollapse').on('click', function () {
                            $('#sidebar').toggleClass('active');
                            $(this).toggleClass('active');
                        });
                    });
        </script>
</body>

</html>