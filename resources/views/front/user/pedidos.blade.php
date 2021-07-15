@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="text-center pt-4">
            <h1>SEUS <br> PEDIDOS</h1>
        </div>

       <table class="table text-white">
        <thead>
          <tr>
            <th scope="col">Numero</th>
            <th scope="col">Pagamento</th>
            <th scope="col">Status</th>
            <th scope="col">Ver</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
          <tr>
            <th scope="row">{{ $pedido->id }}</th>
            <td>{{ $pedido->pagamento }}</td>
            <td>Aguardando</td>
            <td>
                <div>
                    <button type="button" class="btn btn-dark">Detalhes</button>
                </div>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>

    </div>
@endsection
