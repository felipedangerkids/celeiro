<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
    {{-- <link rel="stylesheet" href="{{ url('assets/css/idade/main.css') }}"> --}}
    <link rel="stylesheet" href="{{ url('assets/css/idade/main.min.css') }}">

    <title>CELEIRO DO MALTE</title>
</head>

<body>
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="{{ url('assets/js/script.js') }}"></script>
    <script src="{{ url('assets/js/produto-single/input.js') }}"></script>
    <script type="text/javascript">

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
