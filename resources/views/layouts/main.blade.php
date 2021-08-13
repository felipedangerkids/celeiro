<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('assets/img/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/idade/main.min.css') }}">

    <title>CELEIRO DO MALTE</title>
</head>

<body>

    @if (Request::is('store/login') == false && Request::is('store/register') == false)
        <div class="div-btn-login">
            <button type="button" class="btn btn-dark btn-open-lr"><i class="fa fa-user"></i></button>
        </div>
    @endif

    <div class="aba-lr">
        <div class="div-aba">
            @if (auth()->check())
                <div class="links"><a href="{{route('perfil')}}">{{explode(' ', auth()->user()->name)[0]}}</a></div>
                <div class="links">|</div>
                <div class="links"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a></div>
            @else
                <div class="links"><a href="{{route('store.login')}}">Login</a></div>
                <div class="links">|</div>
                <div class="links"><a href="{{route('store.register')}}">Registrar</a></div>
            @endif
            <div class="links" style="margin-left: auto"><button type="button" class="btn btn-close btn-close-lr"></button></div>
        </div>
    </div>
    @yield('content')

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="{{ url('assets/js/jquery.maskMoney.min.js') }}"></script>
    <script src="{{ url('assets/js/script.js') }}"></script>
    <script type="text/javascript">
        $(document).on('click', '.btn-open-lr', function(){
            $('.aba-lr').css({
                'width': '320px'
            });
        });
        $(document).on('click', '.btn-close-lr', function(){
            $('.aba-lr').css({
                'width': '0'
            });
        });

        $('#buscar').on('click', function() {
            $value = $('#cep').val();
            $.ajax({
                type: 'get',
                url: '{{ url('adress/get') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    console.log(data);
                    $('#endereco').val(data.street);
                    $('#bairro').val(data.district);
                    $('#cidade').val(data.city);
                    $('#estado').val(data.uf);
                }
            });
        })
    </script>
</body>

</html>
