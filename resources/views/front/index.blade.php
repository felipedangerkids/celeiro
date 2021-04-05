<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
      <title>CELEIRO DO MALTE</title>
</head>

<body>
      <section class="container mt-5">
            <div class="d-flex flex-column justify-content-center">
                  <div class="mx-auto logo">
                        <img src="{{ url('assets/img/logo.svg') }}" alt="Logo">
                  </div>
                  <div class="text-uppercase mx-auto mt-3">
                        <h1>Em breve novo site</h1>
                  </div>
                  <div class="text-uppercase mx-auto text-center text-white mid-text mt-5">
                        <p>
                              Mais aconchegante que a nossa casa, só mesmo a sua. Por isso, toda a qualidade do Celeiro
                              do
                              Malte vai até aí.
                        </p>
                  </div>
                  <div class="text-uppercase mx-auto text-center low-text col-md-6 mt-2">
                        <p class="my-auto">
                              Se você tem mais de 18 anos faça o pré cadastro e garanta 10% de desconto na primeira
                              compra.
                        </p>
                  </div>
            </div>
            <div class="d-flex flex-column align-items-center mx-auto text-center form">
                  <div class="form-group col-md-4 col-10 mt-2">

                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                              placeholder="Nome:">

                  </div>
                  <div class="form-group col-md-4 col-10 mt-2">

                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                              placeholder="Whatsapp com dd:">

                  </div>
                  <div class="form-group col-md-4 col-10 mt-2">

                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                              placeholder="E-mail:">

                  </div>
                  <div class="col-md-4 col-10 mt-2 mb-4">
                        <button class="btn btn-env">CADASTRAR E GANHAR 10%</button>
                  </div>
            </div>
      </section>
</body>

</html>