@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="text-center text-white">
            <h3>Endereço</h3>
        </div>
        <div class="text-white">
            <p>Rua: {{ $pedido->adress->endereco }}, {{ $pedido->adress->numero }}</p>
            <p>Bairo: {{ $pedido->adress->bairro }}</p>
            <p>Cidade: {{ $pedido->adress->cidade }}</p>
            <p>CEP: {{ $pedido->adress->cep }}</p>
        </div>
        <div class="text-center text-white">
            <h3>Comprador</h3>
        </div>
        <div class="text-white">
            <p>Nome: {{ $pedido->users->name }}</p>
            <p>Email: {{ $pedido->users->email }}</p>
            <p>WhatsApp: {{ $pedido->users->whatsapp }}</p>
        </div>
        <div class="text-center text-white">
            <h3>Pedidos</h3>
        </div>
        <div class="text-white">
            @foreach ($items as $item)
                <div>
                    <p>Title: {{ $item->title }}</p>
                    <p>Preço: {{  'R$ '.number_format($item->unit_price, 2, ',', '.') }}  </p>
                    <p>Quantidade: {{ $item->quantity }}</p>
                </div>
            @endforeach

        </div>
        <div class="text-center text-white">
            <h3>Pagamento</h3>
        </div>
        <div class="text-white">
            <p>Forma de Pagamento: {{ $pedido->pagamento }}</p>
            <p>Troco: R${{ $pedido->troco ?? 'Cartão' }} </p>
        </div>
        <div class="text-center text-white">
            <h3>Status</h3>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Preparando</option>
                  <option>Saiu Para Entrega</option>
                  <option>Entregue</option>
                  <option>Cancelado</option>
         
                </select>
              </div>
              <div class="form-group col-md-6">
                <button type="submit" class="btn btn-success">Atualizar</button>
              </div>
        </div>
    </div>



@endsection
