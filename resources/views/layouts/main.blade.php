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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0ab2bcde1c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('assets/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/idade/main.min.css') }}">

    <title>CELEIRO DO MALTE</title>
</head>

<body>
    <div class="cookie-idade d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center">
            <div><img class="img-fluid" src="{{asset('assets/img/logo.png')}}" alt=""></div>
            <div class="cookie-title my-3 text-center">
                <h4 class="text-white">VOCÊ É MAIOR DE</h4>
                <h3 class="text-orange">18 ANOS?</h3>
            </div>
            <div class="btns">
                <button type="button" class="btn btn-c-white btn-no-cookie-idade">NÃO</button>
                <button type="button" class="btn btn-c-orange btn-yes-cookie-idade">SIM</button>
            </div>
        </div>
    </div>

    @if (Request::is('store/login') == false && Request::is('store/register') == false && Request::is('/') == false)
        <div class="div-btn-login">
            <button type="button" class="btn btn-dark btn-open-lr"><i class="fa fa-user"></i></button>
        </div>
    @endif

    <div class="alert-custom">
        <div class="w-100 text-dark alert alert-success" role="alert">
            @if(session()->has('success')) {{session()->get('success')}} @endif
        </div>
    </div>

    <div class="aba-lr">
        <div class="div-aba">
            @if (auth()->guard('cliente')->check())
                <div class="links">
                    <a href="{{ route('perfil') }}">{{ explode(' ', auth()->guard('cliente')->user()->name, )[0] }}</a>
                </div>
                <div class="links">|</div>
                <div class="links">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                </div>
                <div class="links">|</div>
                <div class="links"><a href="{{ route('home') }}">Home</a></div>
            @endif
            <div class="links" style="margin-left: auto"><button type="button"
                    class="btn btn-close btn-close-lr"></button></div>
        </div>
    </div>

    @yield('content')
    
    <form id="logout-form" action="{{ route('store.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @if (!Cart::isEmpty())
        @if (Request::is('comanda') == false && Request::is('comanda/*') == false && Request::is('mesa') == false && Request::is('mesa/*') == false)
        <div class="float-btn">
            <a href="{{ route('pre.checkout') }}"> <span class="span-cart">{{ \Cart::getTotalQuantity() }}</span>
                <button class="btn btn-cart"><i class="fas fa-shopping-cart icon"></i>
                </button>
            </a>
        </div>
        @endif
    @endif
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('assets/js/valida_cpf_cnpj.js')}}"></script>
    <script src="{{asset('assets/js/jquery.stopwatch.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="{{ url('assets/js/jquery.maskMoney.min.js') }}"></script>
    {{-- <script src="{{ url('assets/js/qr-scanner.min.js') }}"></script>
    <script src="{{ url('assets/js/qr-scanner-worker.min.js') }}"></script> --}}
    <script type="module" src="{{ url('assets/js/code.js') }}"></script>
    <script src="{{ url('assets/js/script.js') }}"></script>
    <script type="text/javascript">
        $(document).on('click', '.btn-open-lr', function() {
            $('.aba-lr').css({
                'width': '320px'
            });
        });
        $(document).on('click', '.btn-close-lr', function() {
            $('.aba-lr').css({
                'width': '0'
            });
        });

        $('#buscar').on('click', function() {
            $value = $('#cep').val();
            $.ajax({
                type: 'get',
                url: '{{ route("address.cep") }}',
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

        $(document).ready(function(){
            if('{{session()->has("success")}}'){
                $('.alert-custom').css('height', '100vh');

                setTimeout(() => {$('.alert-custom').css('height', '0');}, 1300);
            }
        });
    </script>
</body>

</html>
